<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ClientController extends Controller
{
    private $clientModel;
    public function __construct(Client $client)
    {
        $this->clientModel = $client;
    }

    public function index()
    {
        $clients = $this->clientModel::get();

        return view('aPanel.client.viewClients', compact('clients'));
    }

    public function add()
    {

        return view('aPanel.client.addClient');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:3',
            'title' => 'required|min:3',
            'discription' => 'required|min:5',
            'image' => 'required|mimes:png,jpg,webp,svg'

        ]);
        $fileName = time() . '_clint.' . $request->image->extension();
        $request->image->move(public_path('images/clients'), $fileName);
        $data['image'] = 'images/clients/' . $fileName;

        $this->clientModel->create($data);

        session()->flash('done', 'Client Was Added');
        return redirect(route('admin.client.add'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|min:3',
            'title' => 'required|min:3',
            'discription' => 'required|min:3',
            'image' => 'nullable|mimes:png,jpg,webp.svg',
        ]);

        $updateClient = $this->clientModel->find($id);
        $deleteFile = $updateClient->image;

        if ($updateClient) {

            if ($request->image) {
                $fileName = time() . '_clint.' . $request->image->extension();
                $request->image->move(public_path('/images/clients'), $fileName);
                $data['image'] = 'images/clients/' . $fileName;
            }

            $updateClient->update($data);

            if (File::exists($deleteFile)) {
                unlink($deleteFile);
            }
            session()->flash('done', 'Client Was Updated');
        } else {
            session()->flash('error', 'The Client Is Not Found');
        }
        return redirect(route('admin.clients'));
    }

    public function delete($id)
    {
        $deleteClient = $this->clientModel->find($id);

        $deleteFile = $deleteClient->image;

        if ($deleteClient) {
            $deleteClient->delete();
            if (File::exists($deleteFile)) {
                unlink($deleteFile);
            }
            session()->flash('done', 'Client Was Deleted');
        } else {
            session()->flash('error', 'The Client Is Not Found');
        }

        return redirect(route('admin.clients'));
    }
}
