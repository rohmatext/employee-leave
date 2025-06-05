<x-app-layout>
    <div class="row">
        <div class="col-md-8 col-lg-6 col-xl-4 mx-auto">
            <x-title-bar title="Edit profile" />

            <div>
                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif

                <form method="post" action="{{ route('profile.update') }}">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-sm">
                            <label for="first_name" class="form-label">Nama depan</label>
                            <input type="text" class="form-control" id="first_name" name="first_name"
                                value="{{ old('first_name', $user->first_name) }}">
                            @error('first_name')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm">
                            <label for="last_name" class="form-label">Nama belakang (opsional)</label>
                            <input type="text" class="form-control" id="last_name" name="last_name"
                                value="{{ old('last_name', $user->last_name) }}">
                            @error('last_name')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ old('email', $user->email) }}">
                        @error('email')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="gender" class="form-label">Jenis kelamin</label>
                        <div>
                            @foreach (\App\Enums\GenderEnum::cases() as $gender)
                                <input type="radio" class="btn-check" value="{{ $gender->value }}" name="gender"
                                    id="{{ $gender->value }}" autocomplete="off" @checked($gender->value === old('gender', $user->gender->value))>
                                <label class="btn btn-sm" for="{{ $gender->value }}">{{ $gender->label() }}</label>
                            @endforeach
                        </div>
                        @error('gender')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="birth_date" class="form-label">Tanggal lahir</label>
                        <input type="date" class="form-control" id="birth_date" name="birth_date"
                            value="{{ old('birth_date', $user->birth_date->format('Y-m-d')) }}">
                        @error('birth_date')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
