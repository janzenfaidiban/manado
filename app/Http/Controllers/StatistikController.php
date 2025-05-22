<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Models\Jemaat;
use App\Models\Majelis;
use App\Models\Pendeta;
use Illuminate\Support\Str;

use Illuminate\Validation\ValidationException;

class StatistikController extends Controller
{
    public $pageIcon;
    public $contentTitle;

    public function __construct()
    {
        $this->pageIcon = "fas fa-fw fa-chart-pie";
        $this->contentTitle = "Statistik";
    }

    // STATISTIK JEMAAT
    public function statistikJemaat()
    {
        
        return view('statistik.statistikJemaat', [
            'pageTitle' => Str::ucfirst($this->contentTitle),
            'pageDescription' => 'Melihat ' . Str::lower($this->contentTitle) . ': barang dan ruangan.',
            'pageIcon' => $this->pageIcon,
        ]);

    }

    // STATISTIK MAJELIS
    public function statistikMajelis()
    {
        return view('statistik.statistikMajelis', [
            'pageTitle' => Str::ucfirst($this->contentTitle),
            'pageDescription' => 'Melihat ' . Str::lower($this->contentTitle) . ': barang dan ruangan.',
            'pageIcon' => $this->pageIcon,
        ]);
    }

    // API JEMAAT BERDASARKAN STATUS BAPTIS (status_baptis)
    public function chartJemaatPerStatusBaptis()
    {
        $jemaat = Jemaat::selectRaw('status_baptis, COUNT(*) as total')
            ->groupBy('status_baptis')
            ->get();

        $data = [];
        foreach ($jemaat as $j) {
            $data[] = [
                'name' => $j->status_baptis ?? 'Tidak Diketahui',
                'y' => (int)$j->total,
            ];
        }
        return response()->json($data);
    }


    // API JEMAAT BERDASARKAN LINGKUNGAN (lingkungan)
    public function chartJemaatPerLingkungan()
    {
        $jemaat = Jemaat::selectRaw('lingkungan, COUNT(*) as total')
            ->groupBy('lingkungan')
            ->get();

        $data = [];
        foreach ($jemaat as $j) {
            $data[] = [
                'name' => $j->lingkungan,
                'y' => (int)$j->total,
            ];
        }
        return response()->json($data);
    }

    // API JEMAAT BERDASARKAN PENDIDIKAN TERAKHIR (pendidikan_terakhir)
    public function chartJemaatPerPendidikanTerakhir()
    {
        $jemaat = Jemaat::selectRaw('pendidikan_terakhir, COUNT(*) as total')
            ->groupBy('pendidikan_terakhir')
            ->get();

        $data = [];
        foreach ($jemaat as $j) {
            $data[] = [
                'name' => $j->pendidikan_terakhir,
                'y' => (int)$j->total,
            ];
        }
        return response()->json($data);
    }

    // API JEMAAT BERDASARKAN PEKERJAAN (pekerjaan)
    public function chartJemaatPerPekerjaan()
    {
        $jemaat = Jemaat::selectRaw('pekerjaan, COUNT(*) as total')
            ->groupBy('pekerjaan')
            ->get();

        $data = [];
        foreach ($jemaat as $j) {
            $data[] = [
                'name' => $j->pekerjaan,
                'y' => (int)$j->total,
            ];
        }

        return response()->json($data);
    }

    // API JEMAAT PER JENIS KELAMIN 
    public function chartJemaatPerJenisKelamin()
    {
        $jemaat = Jemaat::selectRaw('jenis_kelamin, COUNT(*) as total')
            ->groupBy('jenis_kelamin')
            ->get();

        $data = [];
        foreach ($jemaat as $j) {
            $data[] = [
                'name' => $j->jenis_kelamin,
                'y' => (int)$j->total,
            ];
        }
        return response()->json($data);
    }

    // API MAJELIS PER JENIS KELAMIN
    public function chartMajelisPerJenisKelamin()
    {
        $maj = Majelis::selectRaw('jenis_kelamin, COUNT(*) as total')
            ->groupBy('jenis_kelamin')
            ->get();

        $data = [];
        foreach ($maj as $m) {
            $data[] = [
                'name' => $m->jenis_kelamin,
                'y' => (int)$m->total,
            ];
        }
        return response()->json($data);
    }

    // API PENDETA PER JENIS KELAMIN
    public function chartPendetaPerJenisKelamin()
    {
        $pen = Pendeta::selectRaw('jenis_kelamin, COUNT(*) as total')
            ->groupBy('jenis_kelamin')
            ->get();

        $data = [];
        foreach ($pen as $p) {
            $data[] = [
                'name' => $p->jenis_kelamin,
                'y' => (int)$p->total,
            ];
        }
        return response()->json($data);
    }

}
