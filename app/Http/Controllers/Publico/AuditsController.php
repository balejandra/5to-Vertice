<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use OwenIt\Auditing\Models\Audit;

class AuditsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:listar-auditoria', ['only' => ['index']]);
        $this->middleware('permission:consultar-auditoria', ['only' => ['show']]);
    }

    /**
     * Display a listing of the Auditable.
     */
    public function index(Request $request)
    {
        if (auth()->user()->hasPermissionTo('listar-auditoria')) {
            $auditables = Audit::all();

            return view('publico.audits.index')
                ->with('auditables', $auditables);
        } else {
            return view('unauthorized');
        }

    }

    /**
     * Display the specified Auditable.
     */
    public function show($id)
    {
        $auditable = Audit::find($id);

        if (empty($auditable)) {
            Flash::error('Auditoria no encontrado.');
            return redirect(route('auditables.index'));
        }
        return view('publico.audits.show')->with('auditable', $auditable);
    }
}