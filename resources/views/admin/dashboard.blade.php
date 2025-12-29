@extends('layout.template')

@section('title', 'Dashboard')

@section('content')
    <div class="container">
        <h2 class="title is-2">Dashboard</h2>
        <hr>

        <div class="columns">
            <div class="column is-one-quarter">
                <div class="box has-text-centered">
                    <p class="title is-4">Users</p>
                    <p class="subtitle is-3">{{ $data['jumlah_users'] }}</p>
                </div>
            </div>

            <div class="column is-one-quarter">
                <div class="box has-text-centered">
                    <p class="title is-4">Writers</p>
                    <p class="subtitle is-3">{{ $data['jumlah_writers'] }}</p>
                </div>
            </div>

            <div class="column is-one-quarter">
                <div class="box has-text-centered">
                    <p class="title is-4">Approvers</p>
                    <p class="subtitle is-3">{{ $data['jumlah_approvers'] }}</p>
                </div>
            </div>

            <div class="column is-one-quarter">
                <div class="box has-text-centered">
                    <p class="title is-4">Posts</p>
                    <p class="subtitle is-3">{{ $data['jumlah_posts'] }}</p>
                </div>
            </div>
        </div>

        <div class="columns">
            <div class="column">
                <canvas id="grafikTotalUser" height="200" class="box"></canvas>
            </div>
            <div class="column">
                <canvas id="grafikTotalPost" height="200" class="box"></canvas>
            </div>

        </div>
    </div>

    <script>
        const ctx = document.getElementById('grafikTotalUser');
        const ctx2 = document.getElementById('grafikTotalPost');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['All Users', 'Writers', 'Approvers'],
                datasets: [{
                    label: 'Total Users',
                    data: [{{ $data['jumlah_users'] }}, {{ $data['jumlah_writers'] }},
                        {{ $data['jumlah_approvers'] }}
                    ],
                    borderWidth: 1,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(54, 162, 235)',
                    ],
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: [
                    'All Posts',
                    'Approver 2 Approved',
                    'Approver 2 Need Revision',
                    'Approver 2 Rejected'
                ],
                datasets: [{
                    label: 'My First Dataset',
                    data: [{{ $data['jumlah_posts'] }}, {{ $data['jumlah_status2_approve'] }},
                        {{ $data['jumlah_status2_needrevision'] }},
                        {{ $data['jumlah_status2_rejected'] }}
                    ],
                    backgroundColor: [
                        'rgb(54, 162, 235)',
                        'rgb(75, 192, 192)',
                        'rgb(255, 205, 86)',
                        'rgb(255, 99, 132)',
                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    </script>

@endsection
