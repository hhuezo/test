<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function index()
    {
        $organizations = Organization::with('user')->where('status','=',1)->get();

        foreach($organizations as $organization)
        {
            $user = $organization->user->first();
            $organization->user_name->name = $user->name;
        }
        return view('organization.index', compact('organizations'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $organization = Organization::findOrFail($id);
        $user = $organization->user->first();
        return view('organization.edit', compact('organization', 'user'));
    }


    public function activate(Request $request)
    {

        $organization = Organization::findOrFail($request->id);
        $organization->status = 2;
        $organization->save();

        $user = $organization->user->first();
        $user->status = 1;
        $user->save();

        $objeto = new  MailController();
        $email = $user->email;
        $subject = "Notificación: Usuario aceptado";
        $content = "Se le informa que su usuario ha sido activado, por tanto ya puede ingresar a la platafoma";
        $result = $objeto->sendMail($email, $subject, $content);

        alert()->success('Organización activada correctamente');
        return redirect('organization');
    }


    public function decline(Request $request)
    {
        $organization = Organization::findOrFail($request->id);
        $organization->status = 3;
        $organization->save();

        $user = $organization->user->first();

        $objeto = new  MailController();
        $email = $user->email;
        $subject = "Notificación: Usuario rechazado";
        $content = "Se le informa que su usuario ha sido rechazado, por tanto no podrá ingresar a la platafoma";
        $result = $objeto->sendMail($email, $subject, $content);

        alert()->info('Organización rechazado correctamente');
        return redirect('organization');
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
