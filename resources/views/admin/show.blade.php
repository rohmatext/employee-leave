<x-app-layout>
    <div class="row">
        <div class="col-md-8 col-lg-6 col-xl-4 mx-auto">
            <x-title-bar title="Detail admin" :back-action="route('admins.index')" />

            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="row">Nama</th>
                                <td>{{ $user->full_name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Email</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Tanggal lahir</th>
                                <td>{{ $user->birth_date->format('d F Y') }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Jenis kelamin</th>
                                <td>{{ $user->gender }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
