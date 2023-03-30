<?php

namespace App\Http\Controllers;

use App\Models\Weapon;
use Exception;
use Illuminate\Http\Request;

class WeaponController extends Controller
{
    function listWeapon()
    {
        try {
            $data = Weapon::all();
            return response()->json($data);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'tidak dapat mendapatkan daftar produk',
                'error' => $e,
                // 'msg' => $e->getMessage(),
            ]);
        }
    }

    function insertWeapon(Request $request)
    {
        try {
            $request->validate([
                'rifle'=>'required',
                'type'=>'required',
                'country'=>'required',
                'description' => 'required',
                'price' => 'required'
            ]);

            $data = new Weapon();
            $data -> rifle = $request -> rifle;
            $data -> type = $request -> type;
            $data -> country = $request -> country;
            $data -> description = $request -> description;
            $data -> price = $request -> price;
            $data -> save();

            return response()->json([
                'message' => 'data berhasil dimasukkan',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'tidak dapat memasukkan data produk',
                'error' => $e,
                // 'msg' => $e->getMessage(),
            ]);
        }

    }

    function deleteWeapon($id)
    {
        try {
            $data = Weapon::find($id);
            $data -> delete();

            return response()->json([
                'message' => 'data berhasil terhapus'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'tidak dapat menghapus data produk',
                'error' => $e,
                // 'msg' => $e->getMessage(),
            ]);
        }
    }

    function updateWeapon($id, Request $request)
    {
        try {
            $request->validate([
                'rifle'=>'required',
                'type'=>'required',
                'country'=>'required',
                'description' => 'required',
                'price' => 'required'
            ]);

            $data = Weapon::find($id);
            $data -> rifle = $request -> rifle;
            $data -> type = $request -> type;
            $data -> country = $request -> country;
            $data -> description = $request -> description;
            $data -> price = $request -> price;
            $data -> save();

            return response()->json([
                'message' => 'data berhasil terupdate',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'tidak dapat memperbarui data produk',
                'error' => $e,
                // 'msg' => $e->getMessage(),
            ]);
        }
    }
}
