<?php

$config = array(
    'pelanggan' => array(
        array(
            'field' => 'nama_pelanggan',
            'label' => 'Nama',
            'rules' => 'required|trim|max_length[25]|min_length[3]|strip_tags[<a><b><i>]',
            'errors' =>
            array(
                'required'      => 'Data %s Wajib Diisi.',

                'min_length' => 'Data %s Harus Berisikan Minimal 3 Huruf',
                'max_length' => 'Data %s Harus Berisikan Maximal 25 Huruf',
            ),
        ),
        array(
            'field' => 'nomor_telepon',
            'label' => 'Nomor Telepon',
            'rules' => 'required|trim|strip_tags',
            'errors' =>
            array(
                'required'      => 'Data %s Wajib Diisi.',
            ),
        ),
        array(
            'field' => 'kota',
            'label' => 'Kota',
            'rules' => 'required|trim|max_length[25]|min_length[3]|strip_tags[<a><b><i>]',
            'errors' =>
            array(
                'min_length' => 'Data %s Harus Berisikan Minimal 3 Huruf',
                'required'      => 'Data %s Wajib Diisi.',
            ),

        ),
        array(
            'field' => 'alamat',
            'label' => 'Alamat',
            'rules' => 'required|trim|strip_tags[<a><b><i>]',
            'errors' =>
            array(
                'required'      => 'Data %s Wajib Diisi.',
            ),
        )
    ),
    'paket' => array(

        array(
            'field' => 'nama_paket',
            'label' => 'Nama Paket',
            'rules' => 'required|trim|min_length[5]|max_length[25]|is_unique[paket.nama_paket]|strip_tags[<a><b><i>]',
            'errors' =>
            array(
                'min_length' => 'Data %s Harus Berisikan Minimal 5 Huruf',
                'is_unique' => 'Data %s Sudah Ada',
                'required'      => 'Data %s Wajib Diisi.',
            ),
        ),
        array(
            'field' => 'barang[]',
            'label' => 'Barang',
            'rules' => 'required',
            'errors' =>
            array(
                'min_length' => 'Data %s Harus Berisikan Minimal 5 Huruf',
                'required'      => 'Data %s Wajib Diisi.',
            ),
        ),
        array(
            'field' => 'waktu',
            'label' => 'Waktu',
            'rules' => 'required|numeric|trim|strip_tags',
            'errors' =>
            array(
                'numeric' => 'Data %s Hanya Boleh Berisikan Angka',
                'required'      => 'Data %s Wajib Diisi.',
            ),
        ),
        array(
            'field' => 'biaya',
            'label' => 'Biaya',
            'rules' => 'required|trim|numeric|strip_tags',
            'errors' =>
            array(
                'numeric' => 'Data %s Hanya Boleh Berisikan Angka',
                'required'      => 'Data %s Wajib Diisi.',
            ),
        ),
        array(
            'field' => 'jenis',
            'label' => 'jenis',
            'rules' => 'required|htmlspecialchars',
            'errors' =>
            array(
                'numeric' => 'Data %s Hanya Boleh Berisikan Angka',
                'required'      => 'Data %s Wajib Diisi.',
            ),
        )
    ),
    'user' => array(
        array(
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'required|trim|max_length[25]|min_length[3]|is_unique[user.username]strip_tags',
            'errors' =>
            array(
                'required'      => 'Data %s Wajib Diisi.',
                'is_unique' => 'Data %s Sudah Ada',
                'min_length' => 'Data %s Harus Berisikan Minimal 3 Huruf',
                'max_length' => 'Data %s Harus Berisikan Maximal 25 Huruf',
            ),
        ),
        array(
            'field' => 'no_telepon',
            'label' => 'Nomor Telepon',
            'rules' => 'required|trim|strip_tags',
            'errors' =>
            array(
                'required'      => 'Data %s Wajib Diisi.',
            ),
        ),
        array(
            'field' => 'level',
            'label' => 'Level',
            'rules' => 'required|trim',
            'errors' =>
            array(
                'required'      => 'Data %s Wajib Diisi.',
            ),
        ),
        array(
            'field' => 'status',
            'label' => 'Status',
            'rules' => 'required|trim',
            'errors' =>
            array(
                'required'      => 'Data %s Wajib Diisi.',
            ),
        ),
        array(
            'field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required|trim|min_length[3]|strip_tags[<a><b><i>]',
            'errors' =>
            array(
                'required'      => 'Data %s Wajib Diisi.',
                'min_length' => 'Data %s Harus Berisikan Minimal 3 Huruf',
                'max_length' => 'Data %s Harus Berisikan Maximal 25 Huruf',
            ),
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required|trim|max_length[25]|min_length[5]|matches[passcon]|strip_tags',
            'errors' =>
            array(
                'min_length' => 'Data %s Harus Berisikan Minimal 5 Huruf',
                'max_length' => 'Data %s Harus Berisikan Maximal 25 Huruf',
                'required'      => 'Data %s Wajib Diisi.',
                'matches' => 'Data %s Tidak Cocok Dengan Repeat Password'
            ),
        ),
        array(
            'field' => 'passcon',
            'label' => 'Repeat Password',
            'rules' => 'required|trim|max_length[25]|min_length[5]|matches[password]|strip_tags',
            'errors' =>
            array(
                'min_length' => 'Data %s Harus Berisikan Minimal 5 Huruf',
                'max_length' => 'Data %s Harus Berisikan Maximal 25 Huruf',
                'required'      => 'Data %s Wajib Diisi.',
                'matches' => 'Data %s Tidak Cocok Dengan Password'
            ),
        ),
    ),
    'reset' => array(
        array(
            'field' => 'new_password1',
            'label' => 'Password Baru',
            'rules' => 'required|trim|max_length[25]|min_length[5]|matches[new_password2]|strip_tags',
            'errors' =>
            array(
                'min_length' => 'Data %s Harus Berisikan Minimal 5 Huruf',
                'max_length' => 'Data %s Harus Berisikan Maximal 25 Huruf',
                'required'      => 'Data %s Wajib Diisi.',
                'matches' => 'Data %s Tidak Cocok Dengan Password'
            ),
        ),
        array(
            'field' => 'new_password2',
            'label' => 'Password Baru',
            'rules' => 'required|trim|max_length[25]|min_length[5]|matches[new_password1]|strip_tags',
            'errors' =>
            array(
                'min_length' => 'Data %s Harus Berisikan Minimal 5 Huruf',
                'max_length' => 'Data %s Harus Berisikan Maximal 25 Huruf',
                'required'      => 'Data %s Wajib Diisi.',
                'matches' => 'Data %s Tidak Cocok Dengan Password'
            ),
        )
    ),
    'mutasi' => array(
        array(
            'field' => 'nominal',
            'label' => 'Nominal',
            'rules' => 'required|trim|strip_tags',
            'errors' =>
            array(
                'required'      => 'Data %s Wajib Diisi.',
                'numeric' => 'Data %s Hanya Boleh Berisikan Angka',
            ),
        ),
        array(
            'field' => 'keterangan',
            'label' => 'Keterangan',
            'rules' => 'required|trim|strip_tags[<a><b><i>]',
            'errors' =>
            array(
                'required'      => 'Data %s Wajib Diisi.',
            ),
        ),
    ),
    'passprofile' => array(
        array(
            'field' => 'current_password',
            'label' => 'Password Lama',
            'rules' => 'required|trim|strip_tags',
            'errors' =>
            array(
                'min_length' => 'Data %s Harus Berisikan Minimal 5 Huruf',
                'max_length' => 'Data %s Harus Berisikan Maximal 25 Huruf',
                'required'      => 'Data %s Wajib Diisi.',
                'matches' => 'Data %s Tidak Cocok Dengan Password'
            ),
        ),
        array(
            'field' => 'new_password1',
            'label' => 'Password Baru',
            'rules' => 'required|trim|max_length[25]|min_length[5]|matches[new_password2]|strip_tags',
            'errors' =>
            array(
                'min_length' => 'Data %s Harus Berisikan Minimal 5 Huruf',
                'max_length' => 'Data %s Harus Berisikan Maximal 25 Huruf',
                'required'      => 'Data %s Wajib Diisi.',
                'matches' => 'Data %s Tidak Cocok Dengan Password'
            ),
        ),
        array(
            'field' => 'new_password2',
            'label' => 'Password Baru',
            'rules' => 'required|trim|max_length[25]|min_length[5]|matches[new_password1]|strip_tags',
            'errors' =>
            array(
                'min_length' => 'Data %s Harus Berisikan Minimal 5 Huruf',
                'max_length' => 'Data %s Harus Berisikan Maximal 25 Huruf',
                'required'      => 'Data %s Wajib Diisi.',
                'matches' => 'Data %s Tidak Cocok Dengan Password'
            ),
        )
    ),
);
