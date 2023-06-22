<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tshirt_images;
use App\Models\Colors;
use Illuminate\Http\Request;
use App\Http\Requests\Tshirt_imagesPost;
use Illuminate\Support\Facades\Storage;

class Tshirt_imagesController extends Controller
{
    public function index()
    {
        $tshirt_image = Tshirt_images::paginate(5);
        $cores = Colors::all();
        //dd($tshirt_image);
        return view('tshirt_images.index')->with('tshirt_images', $tshirt_image)->with('cores',$cores);
    }

    public function update(Tshirt_imagesPost $request, Tshirt_images $tshirt_image)
    {

        $validated_data = $request->validated();
        $tshirt_image->nome = $validated_data['name'];
        $tshirt_image->descricao = $validated_data['description'];



        if ($request->hasFile('image_url')) {
            $path = $request->image_url->store('storage/tshirt_images/');
            $tshirt_image->image_url = basename($path);
        }
        $tshirt_image->save();

        return redirect()->route('tshirt_images.index')
            ->with('alert-msg', 'tshirt_image "' . $tshirt_image->name . '" foi alterado com sucesso!')
            ->with('alert-type', 'success');
    }

    public function search(Request $request)
    {
        $category_id = $request->input('category_id');
        $name = $request->input('name');
        $description = $request->input('description');

        $query = Tshirt_Images::query();

        if ($category_id && $name && $description) {
            $query->where('category_id', $category_id)
                ->where('name', 'LIKE', "%$name%")
                ->where('description', 'LIKE', "%$description%");
        }elseif ($category_id && $name) {
            $query->where('category_id', $category_id);
            $query->where('name', 'LIKE', "%$name%");
        }elseif ($name && $description) {
            $query->where('name', 'LIKE', "%$name%");
            $query->where('description', 'LIKE', "%$description%");
        }elseif ($description && $category_id) {
            $query->where('description', 'LIKE', "%$description%");
            $query->where('category_id', $category_id);
        }
        elseif ($category_id) {
            $query->where('category_id', $category_id);
        }elseif ($name) {
            $query->where('name', 'LIKE', "%$name%");
        }elseif ($description) {
            $query->where('description', 'LIKE', "%$description%");
        }

        $tshirt_images = $query->paginate(10);

        return view('tshirt_images.search', compact('tshirt_images', 'category_id', 'name'));
    }
}
