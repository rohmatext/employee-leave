<x-app-layout>
    <div class="row">
        <div class="col-md-8 col-lg-6 mx-auto">
            <x-title-bar title="Detail pegawai" :back-action="route('employees.index')" />

            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="row">Nama</th>
                                <td>{{ $employee->full_name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Email</th>
                                <td>{{ $employee->email }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Nomor HP</th>
                                <td>{{ $employee->phone_number }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Jenis kelamin</th>
                                <td>{{ $employee->gender->label() }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Alamat</th>
                                <td>{{ $employee->address }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
