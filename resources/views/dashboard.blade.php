@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<style>
    .summary-cards {
        background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
        border-radius: 20px;
        padding: 30px;
        margin-bottom: 30px;
        position: relative;
        overflow: hidden;
    }
    
    .summary-cards::before {
        content: '';
        position: absolute;
        top: -50px;
        right: -50px;
        width: 200px;
        height: 200px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
    }
    
    .summary-cards::after {
        content: '';
        position: absolute;
        bottom: -30px;
        left: -30px;
        width: 150px;
        height: 150px;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 50%;
    }
    
    .summary-card {
        background: white;
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
        position: relative;
        z-index: 2;
    }
    
    .summary-card:hover {
        transform: translateY(-5px);
    }
    
    .summary-card h3 {
        font-size: 2.5rem;
        font-weight: 700;
        color: #1e40af;
        margin-bottom: 5px;
    }
    
    .summary-card p {
        color: #6b7280;
        font-size: 0.9rem;
        margin-bottom: 0;
    }
    
    .chart-container {
        background: white;
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        margin-bottom: 20px;
    }
    
    .chart-title {
        font-size: 1.2rem;
        font-weight: 600;
        color: #374151;
        margin-bottom: 20px;
    }
    
    .time-buttons {
        display: flex;
        gap: 10px;
        margin-bottom: 20px;
    }
    
    .time-btn {
        padding: 8px 16px;
        border: none;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .time-btn.active {
        background: #1e40af;
        color: white;
    }
    
    .time-btn:not(.active) {
        background: #f3f4f6;
        color: #6b7280;
    }
    
    .progress-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 15px;
    }
    
    .progress-bar-custom {
        height: 8px;
        background: #e5e7eb;
        border-radius: 4px;
        overflow: hidden;
        flex: 1;
        margin: 0 15px;
    }
    
    .progress-fill {
        height: 100%;
        background: #3b82f6;
        border-radius: 4px;
        transition: width 0.3s ease;
    }
    
    .year-label {
        font-weight: 600;
        color: #374151;
        min-width: 50px;
    }
    
    .participant-count {
        color: #6b7280;
        font-size: 0.9rem;
        min-width: 80px;
        text-align: right;
    }
</style>

<!-- Summary Cards Section -->
<div class="summary-cards">
    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="summary-card">
                <h3>223</h3>
                <p>Jumlah Pendaftar</p>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="summary-card">
                <h3>157</h3>
                <p>Jumlah Tidak Terverifikasi</p>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="summary-card">
                <h3>66</h3>
                <p>Jumlah Verifikasi</p>
            </div>
        </div>
    </div>
</div>

<!-- Charts Section -->
<div class="row">
    <div class="col-lg-8">
        <div class="chart-container">
            <h5 class="chart-title">Jumlah Pendaftar</h5>
            <div class="time-buttons">
                <button class="time-btn active">12 Months</button>
                <button class="time-btn">6 Months</button>
                <button class="time-btn">30 Days</button>
                <button class="time-btn">7 Days</button>
            </div>
            <div style="height: 300px; background: #f8fafc; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: #6b7280;">
                <div class="text-center">
                    <i class="fas fa-chart-line fa-3x mb-3"></i>
                    <p>Line Chart - Jumlah Pendaftar</p>
                    <small>Nov: 75, Dec: 85, Jan: 25, Feb: 45, Mar: 70, Apr: 100, Mei: 60, Jun: 60</small>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="chart-container">
            <h5 class="chart-title">Data Pertahun</h5>
            <div class="progress-item">
                <span class="year-label">2025</span>
                <div class="progress-bar-custom">
                    <div class="progress-fill" style="width: 85%;"></div>
                </div>
                <span class="participant-count">64 Peserta</span>
            </div>
            <div class="progress-item">
                <span class="year-label">2024</span>
                <div class="progress-bar-custom">
                    <div class="progress-fill" style="width: 55%;"></div>
                </div>
                <span class="participant-count">35 Peserta</span>
            </div>
            <div class="progress-item">
                <span class="year-label">2023</span>
                <div class="progress-bar-custom">
                    <div class="progress-fill" style="width: 70%;"></div>
                </div>
                <span class="participant-count">45 Peserta</span>
            </div>
            <div class="progress-item">
                <span class="year-label">2022</span>
                <div class="progress-bar-custom">
                    <div class="progress-fill" style="width: 90%;"></div>
                </div>
                <span class="participant-count">57 Peserta</span>
            </div>
            <div class="progress-item">
                <span class="year-label">2021</span>
                <div class="progress-bar-custom">
                    <div class="progress-fill" style="width: 35%;"></div>
                </div>
                <span class="participant-count">22 Peserta</span>
            </div>
        </div>
    </div>
</div>

<script>
// Time button functionality
document.querySelectorAll('.time-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        document.querySelectorAll('.time-btn').forEach(b => b.classList.remove('active'));
        this.classList.add('active');
    });
});
</script>

@endsection
