@extends('layouts.app')

@section('title', 'Data Penerima')

@section('content')
<style>
    .page-header {
        background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
        border-radius: 15px;
        padding: 25px;
        margin-bottom: 30px;
        color: white;
    }

    .search-container {
        background: white;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        margin-bottom: 25px;
    }

    .action-buttons {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .btn-custom {
        border-radius: 8px;
        padding: 10px 20px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-custom:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }

    .data-table {
        background: white;
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    }

    .table th {
        background: #f8fafc;
        color: #374151;
        font-weight: 600;
        border: none;
        padding: 15px 12px;
    }

    .table td {
        padding: 15px 12px;
        border: none;
        border-bottom: 1px solid #f1f5f9;
    }

    .table tbody tr:hover {
        background: #f8fafc;
    }

    .status-badge {
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
    }

    .status-completed {
        background: #dcfce7;
        color: #166534;
    }

    .status-registered {
        background: #fef3c7;
        color: #92400e;
    }

    .status-pending {
        background: #fee2e2;
        color: #991b1b;
    }
</style>

<div class="page-header">
    <h2 class="mb-3">Data Penerima</h2>
    <p class="mb-0">Kelola data penerima bantuan pendidikan</p>
</div>

<div class="search-container">
    <div class="row align-items-center">
        <div class="col-md-6">
            <form action="{{ route('recipients.index') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control me-2"
                       placeholder="Cari penerima..." value="{{ request('search') }}"
                       style="border-radius: 8px; border: 1px solid #e5e7eb;">
                <button type="submit" class="btn btn-primary btn-custom">
                    <i class="fas fa-search me-2"></i>Search
                </button>
            </form>
        </div>
        <div class="col-md-6">
            <div class="action-buttons justify-content-md-end">
                <a href="{{ route('recipients.import') }}" class="btn btn-success btn-custom">
                    <i class="fas fa-plus me-2"></i>Import Excel
                </a>
                <a href="{{ route('recipients.printAll') }}" class="btn btn-info btn-custom">
                    <i class="fas fa-download me-2"></i>Download QR
                </a>
            </div>
        </div>
    </div>
</div>

<div class="data-table">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>QR Code</th>
                    <th>Nama Anak</th>
                    <th>Nama Ayah</th>
                    <th>Nama Ibu</th>
                    <th>Sekolah</th>
                    <th>Kelas</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recipients as $recipient)
                    <tr>
                        <td>
                            <span class="badge bg-primary">{{ $recipient->qr_code }}</span>
                        </td>
                        <td>{{ $recipient->child_name }}</td>
                        <td>{{ $recipient->Ayah_name }}</td>
                        <td>{{ $recipient->Ibu_name }}</td>
                        <td>{{ $recipient->school_name }}</td>
                        <td>{{ $recipient->class }}</td>
                        <td>
                            @if ($recipient->is_distributed && $recipient->registrasi)
                                <span class="status-badge status-completed">
                                    <i class="fas fa-check-circle me-1"></i>Completed
                                </span>
                            @elseif ($recipient->registrasi && !$recipient->is_distributed)
                                <span class="status-badge status-registered">
                                    <i class="fas fa-check me-1"></i>Sudah registrasi
                                </span>
                            @else
                                <span class="status-badge status-pending">
                                    <i class="fas fa-times me-1"></i>Belum registrasi
                                </span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('recipients.show', $recipient) }}" class="btn btn-sm btn-outline-info">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('recipients.edit', $recipient) }}" class="btn btn-sm btn-outline-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('recipients.destroy', $recipient) }}" method="POST"
                                      class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center py-4">
                            <div class="text-muted">
                                <i class="fas fa-inbox fa-2x mb-3"></i>
                                <p>Belum ada data penerima</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $recipients->links() }}
    </div>
</div>
@endsection
