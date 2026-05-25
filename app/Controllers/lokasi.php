<?php

namespace App\Controllers;

use App\Models\ModelLokasi;

class Lokasi extends BaseController
{
    protected $ModelLokasi;

    public function __construct()
    {
        $this->ModelLokasi = new ModelLokasi();
    }

    public function index()
    {
        $data = [
            'judul'  => 'Data Lokasi',
            'page'   => 'lokasi/v_data_lokasi',
            'lokasi' => $this->ModelLokasi->allData()
        ];
        return view('v_template', $data);
    }

    public function inputLokasi()
    {
        $data = [
            'judul' => 'Input Lokasi',
            'page'  => 'lokasi/v_input_lokasi',
        ];
        return view('v_template', $data);
    }

    public function insertData()
    {
        if ($this->validate([
            'nama_lokasi' => [
                'label'  => 'Nama Lokasi',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !!!'
                ]
            ],
            'alamat_lokasi' => [
                'label'  => 'Alamat Lokasi',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !!!'
                ]
            ],
            'latitude' => [
                'label'  => 'Latitude',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !!!'
                ]
            ],
            'longitude' => [
                'label'  => 'Longitude',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !!!'
                ]
            ],
            'foto_lokasi' => [
                'label'  => 'Foto Lokasi',
                'rules'  => 'uploaded[foto_lokasi]|max_size[foto_lokasi,10240]|mime_in[foto_lokasi,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => '{field} Tidak Boleh Kosong !!!',
                    'max_size' => 'Ukuran {field} Maksimal 10240 KB !!',
                    'mime_in'  => 'Format {field} Harus jpg, jpeg, png'
                ]
            ]
        ])) {
            $foto_lokasi = $this->request->getFile('foto_lokasi');
            $nama_file_foto = $foto_lokasi->getRandomName();

            $data = [
                'nama_lokasi'   => $this->request->getPost('nama_lokasi'),
                'alamat_lokasi' => $this->request->getPost('alamat_lokasi'),
                'latitude'      => $this->request->getPost('latitude'),
                'longitude'     => $this->request->getPost('longitude'),
                'foto_lokasi'   => $nama_file_foto
            ];

            $foto_lokasi->move('foto', $nama_file_foto);
            $this->ModelLokasi->insertData($data);

            session()->setFlashdata('pesan', 'Data Lokasi Berhasil Ditambahkan !!!');
            return redirect()->to('lokasi/index');
        } else {
            $data = [
                'judul'  => 'Input Lokasi',
                'page'   => 'lokasi/v_input_lokasi',
                'errors' => $this->validator->getErrors()
            ];
            return view('v_template', $data);
        }
    }

    public function updateData($id_lokasi)
    {
        if ($this->validate([
            'nama_lokasi' => [
                'label'  => 'Nama Lokasi',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !!!'
                ]
            ],
            'alamat_lokasi' => [
                'label'  => 'Alamat Lokasi',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !!!'
                ]
            ],
            'latitude' => [
                'label'  => 'Latitude',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !!!'
                ]
            ],
            'longitude' => [
                'label'  => 'Longitude',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !!!'
                ]
            ],
            'foto_lokasi' => [
                'label'  => 'Foto Lokasi',
                'rules'  => 'max_size[foto_lokasi,10240]|mime_in[foto_lokasi,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} Maksimal 10240 KB !!',
                    'mime_in'  => 'Format {field} Harus jpg, jpeg, png'
                ]
            ]
        ])) {
            $foto_lokasi = $this->request->getFile('foto_lokasi');

            $data = [
                'nama_lokasi'   => $this->request->getPost('nama_lokasi'),
                'alamat_lokasi' => $this->request->getPost('alamat_lokasi'),
                'latitude'      => $this->request->getPost('latitude'),
                'longitude'     => $this->request->getPost('longitude'),
            ];

            if ($foto_lokasi->isValid() && !$foto_lokasi->hasMoved()) {
                $lokasiLama = $this->ModelLokasi->getData($id_lokasi);
                if ($lokasiLama && file_exists('foto/' . $lokasiLama['foto_lokasi'])) {
                    unlink('foto/' . $lokasiLama['foto_lokasi']);
                }

                $nama_file_foto = $foto_lokasi->getRandomName();
                $foto_lokasi->move('foto', $nama_file_foto);
                $data['foto_lokasi'] = $nama_file_foto;
            }

            $this->ModelLokasi->updateData($data, $id_lokasi);

            session()->setFlashdata('pesan', 'Data Lokasi Berhasil Diperbarui !!!');
            return redirect()->to('lokasi/index');
        } else {
            $data = [
                'judul'      => 'Edit Lokasi',
                'page'       => 'lokasi/v_edit_lokasi',
                'lokasi'     => $this->ModelLokasi->getData($id_lokasi),
                'lokasi_all' => $this->ModelLokasi->allData(),
                'errors'     => $this->validator->getErrors()
            ];
            return view('v_template', $data);
        }
    }

    public function pemetaanLokasi()
    {
        $data = [
            'judul'  => 'Pemetaan Lokasi',
            'page'   => 'lokasi/v_pemetaan_lokasi',
            'lokasi' => $this->ModelLokasi->allData()
        ];
        return view('v_template', $data);
    }

    public function editLokasi($id_lokasi)
    {
        $data = [
            'judul'      => 'Edit Lokasi',
            'page'       => 'lokasi/v_edit_lokasi',
            'lokasi'     => $this->ModelLokasi->getData($id_lokasi),
            'lokasi_all' => $this->ModelLokasi->allData()
        ];
        return view('v_template', $data);
    }

    public function deleteData($id_lokasi)
    {
        $lokasiLama = $this->ModelLokasi->getData($id_lokasi);
        if ($lokasiLama && file_exists('foto/' . $lokasiLama['foto_lokasi'])) {
            unlink('foto/' . $lokasiLama['foto_lokasi']);
        }

        $this->ModelLokasi->deleteData($id_lokasi);

        session()->setFlashdata('pesan', 'Data Lokasi Berhasil Dihapus !!!');
        return redirect()->to('lokasi/index');
    }
}
