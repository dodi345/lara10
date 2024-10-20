<x-dashboard-layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <section class="section">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row">
            <div class="col-lg-10">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Data Mahasiswa</h5>
                                <a href="{{ route('mahasiswa.create') }}">
                                    <button class="btn btn-primary mb-3">
                                        <i class="bi bi-plus-circle"></i> Create New</button>
                                </a>

                                <!-- Table with stripped rows -->
                                <table class="table datatable">
                                    <thead class="text-center">
                                        <tr>
                                            <th>#</th>
                                            <th>
                                                <b>N</b>ame
                                            </th>
                                            <th>NIM</th>
                                            <th>Kelas</th>
                                            <th>Jurusan</th>
                                            <th>Program Studi</th>
                                            <th>Semester</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="">
                                        <?php $no = 1;?>
                                        @foreach ($students as $key => $student)
                                            <tr class="">
                                                <td class="text-center">{{ $no++ }}</td>
                                                <td>{{ $student->name }}</td>
                                                <td>{{ $student->nim }}</td>
                                                <td>{{ $student->kelas->kelas }}</td>
                                                <td>{{ $student->prodi->name }}</td>
                                                <td>{{ $student->major->name}}</td>
                                                <td>{{ $student->semester->semester}}</td>
                                                <td>
                                                    <div class="">
                                                        <a href="/admin/mahasiswa/{{ $student->uuid }}">
                                                            <button class="btn btn-success btn-sm " name="view">
                                                                <i class="bi bi-eye"></i>
                                                            </button>
                                                        </a>
                                                        <a href="/admin/mahasiswa/{{ $student->uuid }}/edit">
                                                            <button class="btn btn-primary btn-sm" name="edit">
                                                                <i class="bi bi-pencil-square"></i>
                                                            </button>
                                                        </a>
                                                        <form action="{{ route('mahasiswa.index') }}/{{ $student->uuid }}"
                                                            method="POST" class="d-inline">
                                                            @method('delete')
                                                            @csrf
                                                            <button class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Are you sure for that?')"
                                                                name="delete">
                                                                <i class="bi bi-x-circle"></i>
                                                            </button>

                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                <!-- End Table with stripped rows -->

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
</x-dashboard-layout>
