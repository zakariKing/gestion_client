@props(['type' => 'info', 'message' => '', 'color' => '', 'timer' => 3000])

@php
    $colors = [
        'success' => 'green',
        'error' => 'red',
        'warning' => 'yellow',
        'info' => 'blue'
    ];

    $alertColor = $colors[$type] ?? $colors['info'];
    $bgColor = "bg-{$alertColor}-200";
    $textColor = "text-{$alertColor}-900";
    $progressBarColor = "bg-{$alertColor}-600";
@endphp

<div id="alert" class="fixed bottom-2.5 right-2.5 rounded-lg shadow-lg {{ $bgColor }} {{ $textColor }} font-bold transition-opacity opacity-0"
     style="min-width: 300px; display: none;">
    <span class="m-5">{{ $message }}</span>
    <button id="closeAlert" class="mx-4 pt-2.5 text-xl font-semibold h-full">✕</button>
    <div id="progressBar" class="h-1 {{ $progressBarColor }} mt-2 rounded"></div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const alert = document.getElementById('alert');
        const closeAlert = document.getElementById('closeAlert');
        const progressBar = document.getElementById('progressBar');
        const timer = {{ $timer }};

        if (alert) {
            alert.style.display = 'block';
            setTimeout(() => {
                alert.classList.add('opacity-100');
            }, 100); // Small delay for fade-in effect

            // Animate the progress bar
            progressBar.style.transition = `width ${timer}ms linear`;
            progressBar.style.width = '100%';

            // Close alert after timer expires
            setTimeout(() => {
                alert.classList.remove('opacity-100');
                progressBar.style.width = '0'; // Reset progress bar
                setTimeout(() => {
                    alert.style.display = 'none';
                }, 300); // Wait for fade-out effect
            }, timer);

            // Close button event
            closeAlert.addEventListener('click', () => {
                alert.classList.remove('opacity-100');
                setTimeout(() => {
                    alert.style.display = 'none';
                }, 300);
            });
        }
    });
</script>
