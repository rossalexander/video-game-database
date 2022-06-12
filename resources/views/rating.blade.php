<script>
    @if($event) window.livewire.on('{{ $event }}', params => { @endif

        @if($event)
        var progressBarContainer = document.getElementById(params.slug);
        @else
        var progressBarContainer = document.getElementById('{{$slug}}');
        @endif
        var bar = new ProgressBar.Circle(progressBarContainer, {
            color: '#fff',
            strokeWidth: 6,
            trailWidth: 3,
            trailColor: '#374151',
            easing: 'easeInOut',
            duration: 2500,
            text: {
                autoStyleContainer: false
            },
            @if($event)
            from: {color: ( params.rating / 100  > 1) ?  '#65A30D' : '#DC2626', width: 6},
            to: {color: '#65A30D', width: 6},
            @else
            from: {color: ({{$rating / 100 }} > 1) ?  '#65A30D' : '#DC2626', width: 6},
            to: {color: '#65A30D', width: 6},
            @endif

            // Set default step function for all animate calls
            step: function (state, circle) {
                circle.path.setAttribute('stroke', state.color);
                circle.path.setAttribute('stroke-width', state.width);

                var value = Math.round(circle.value() * 100);
                if (value === 0) {
                    circle.setText('');
                } else {
                    circle.setText(value + '%');
                }

            }
        });

        @if($event)
        bar.animate(params.rating);
        @else
        bar.animate({{ $rating }} / 100);
        @endif

        @if($event) })
    @endif

</script>
