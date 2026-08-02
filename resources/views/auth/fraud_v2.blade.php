<style>
.fc-wrap { font-family: 'Segoe UI', sans-serif; padding: 4px 0; }

/* Summary Cards */
.fc-cards { display: grid; grid-template-columns: repeat(4, 1fr); gap: 8px; margin-bottom: 14px; }
.fc-card {
    background: #f8f9fa;
    border-radius: 10px;
    padding: 10px 6px;
    text-align: center;
    border: 1px solid #e9ecef;
}
.fc-card .fc-val {
    font-size: 1.6rem;
    font-weight: 700;
    line-height: 1;
    margin-bottom: 2px;
}
.fc-card .fc-label {
    font-size: 0.65rem;
    color: #6c757d;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}
.fc-val.success { color: #28a745; }
.fc-val.danger  { color: #dc3545; }
.fc-val.warning { color: #fd7e14; }
.fc-val.dark    { color: #212529; }

/* Progress */
.fc-progress-wrap { margin-bottom: 14px; }
.fc-progress-label {
    display: flex;
    justify-content: space-between;
    font-size: 0.75rem;
    font-weight: 600;
    margin-bottom: 3px;
    color: #495057;
}
.fc-bar {
    height: 14px;
    border-radius: 20px;
    background: #e9ecef;
    overflow: hidden;
    margin-bottom: 8px;
}
.fc-bar-fill {
    height: 100%;
    border-radius: 20px;
    font-size: 0.65rem;
    color: #fff;
    line-height: 14px;
    text-align: center;
    transition: width 0.6s ease;
}
.fc-bar-fill.green { background: linear-gradient(90deg, #28a745, #20c997); }
.fc-bar-fill.red   { background: linear-gradient(90deg, #dc3545, #ff6b6b); }

/* Table */
.fc-table { width: 100%; border-collapse: collapse; font-size: 0.8rem; }
.fc-table th {
    background: #212529;
    color: #fff;
    padding: 7px 8px;
    text-align: center;
    font-weight: 600;
    font-size: 0.72rem;
    white-space: nowrap;
}
.fc-table td {
    padding: 7px 8px;
    text-align: center;
    border-bottom: 1px solid #f0f0f0;
    white-space: nowrap;
}
.fc-table tr:last-child td { background: #f8f9fa; font-weight: 700; border-top: 2px solid #dee2e6; }
.fc-table td:first-child { text-align: left; font-weight: 600; }
.fc-table .t-green { color: #28a745; font-weight: 700; }
.fc-table .t-red   { color: #dc3545; font-weight: 700; }

/* Status Badge */
.fc-badge {
    display: inline-block;
    padding: 3px 9px;
    border-radius: 20px;
    font-size: 0.68rem;
    font-weight: 700;
    letter-spacing: 0.3px;
}
.fc-badge.good    { background: #d4edda; color: #155724; }
.fc-badge.warning { background: #fff3cd; color: #856404; }
.fc-badge.danger  { background: #f8d7da; color: #721c24; }
.fc-badge.unknown { background: #e9ecef; color: #6c757d; }

/* Error row */
.fc-error { color: #dc3545; font-size: 0.78rem; padding: 8px; }
</style>

<div class="fc-wrap">

    {{-- 4 Summary Cards --}}
    <div class="fc-cards">
        <div class="fc-card">
            <div class="fc-val dark">{{ $summary['total_parcels'] }}</div>
            <div class="fc-label">Total Parcels</div>
        </div>
        <div class="fc-card">
            <div class="fc-val success">{{ $summary['total_delivered'] }}</div>
            <div class="fc-label">Delivered</div>
        </div>
        <div class="fc-card">
            <div class="fc-val danger">{{ $summary['total_cancelled'] }}</div>
            <div class="fc-label">Cancelled</div>
        </div>
        <div class="fc-card">
            <div class="fc-val warning">{{ $summary['total_frauds'] }}</div>
            <div class="fc-label">Fraud Reports</div>
        </div>
    </div>

    {{-- Progress Bars --}}
    <div class="fc-progress-wrap">
        <div class="fc-progress-label">
            <span>Success Rate</span>
            <span>{{ $summary['success_rate'] }}%</span>
        </div>
        <div class="fc-bar">
            <div class="fc-bar-fill green" style="width: {{ $summary['success_rate'] }}%"></div>
        </div>

        <div class="fc-progress-label">
            <span>Cancel Rate</span>
            <span>{{ $summary['cancel_rate'] }}%</span>
        </div>
        <div class="fc-bar">
            <div class="fc-bar-fill red" style="width: {{ $summary['cancel_rate'] }}%"></div>
        </div>
    </div>

    {{-- Courier Table --}}
    <table class="fc-table">
        <thead>
            <tr>
                <th>Courier</th>
                <th>Total</th>
                <th>Delivered</th>
                <th>Cancelled</th>
                <th>Fraud</th>
                <th>Success</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $row)
            <tr>
                <td>{{ $row['courier'] }}</td>
                @if ($row['error'])
                    <td colspan="6" class="fc-error">⚠️ {{ $row['error'] }}</td>
                @else
                    <td>{{ $row['total'] }}</td>
                    <td class="t-green">{{ $row['delivered'] }}</td>
                    <td class="t-red">{{ $row['cancelled'] }}</td>
                    <td>{{ $row['fraud_reports'] }}</td>
                    <td>{{ $row['success_rate'] }}%</td>
                    <td>
                        @if ($row['status'] === 'good')
                            <span class="fc-badge good">Good</span>
                        @elseif ($row['status'] === 'warning')
                            <span class="fc-badge warning">Warning</span>
                        @elseif ($row['status'] === 'danger')
                            <span class="fc-badge danger">High Risk</span>
                        @else
                            <span class="fc-badge unknown">—</span>
                        @endif
                    </td>
                @endif
            </tr>
            @endforeach

            {{-- Total row (only if multiple couriers) --}}
            @if(count($results) > 1)
            <tr>
                <td>Total</td>
                <td>{{ $summary['total_parcels'] }}</td>
                <td class="t-green">{{ $summary['total_delivered'] }}</td>
                <td class="t-red">{{ $summary['total_cancelled'] }}</td>
                <td>{{ $summary['total_frauds'] }}</td>
                <td>{{ $summary['success_rate'] }}%</td>
                <td>
                    @if ($summary['overall_status'] === 'good')
                        <span class="fc-badge good">Good</span>
                    @elseif ($summary['overall_status'] === 'warning')
                        <span class="fc-badge warning">Warning</span>
                    @else
                        <span class="fc-badge danger">High Risk</span>
                    @endif
                </td>
            </tr>
            @endif
        </tbody>
    </table>

</div>
