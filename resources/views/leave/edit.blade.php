<x-app-layout>
    <div class="row">
        <div class="col-md-8 col-lg-6 mx-auto">
            <x-title-bar title="Buat cuti" :back-action="route('leaves.index')" />

            <div>
                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif

                <form method="post" action="{{ route('leaves.update', $leave) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="employee" class="form-label">Pilih pegawai</label>
                        <select class="form-select" id="employee" name="employee_id">
                            <option value="" hidden>Pilih pegawai</option>
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}" @selected(old('employee_id', $leave->employee_id) == $employee->id)>
                                    {{ $employee->full_name }}</option>
                            @endforeach
                        </select>
                        @error('employee_id')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm">
                            <label for="start_date" class="form-label">Tanggal mulai</label>
                            <input type="date" class="form-control" id="start_date" name="start_date"
                                value="{{ old('start_date', $leave->start_date->format('Y-m-d')) }}">
                            @error('start_date')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm">
                            <label for="end_date" class="form-label">Tanggal selesai</label>
                            <input type="date" class="form-control" id="end_date" name="end_date"
                                value="{{ old('end_date', $leave->end_date->format('Y-m-d')) }}">
                            @error('end_date')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="reason" class="form-label">Alamat</label>
                        <textarea class="form-control" id="reason" name="reason" rows="2">{{ old('reason', $leave->reason) }}</textarea>
                        @error('reason')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
