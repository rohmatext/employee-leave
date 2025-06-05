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

            <div class="card mt-4">
                <div class="card-body">
                    <h5 class="card-title">
                        Riwayat cuti
                    </h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Tanggal cuti</th>
                                <th scope="col">Alasan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($employee->leaves as $leave)
                                <tr>
                                    <td>{{ $leave->start_date->format('d F Y') . ' - ' . $leave->end_date->format('d F Y') }}
                                    </td>
                                    <td>{{ $leave->reason }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="text-center">Tidak ada data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</x-app-layout>
