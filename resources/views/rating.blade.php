<script>
    var progressBarContainer = document.getElementById('{{$slug}}');
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
        from: {color: '#65A30D', width: 6},
        to: {color: '#65A30D', width: 6},
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
    bar.animate({{ $rating }} / 100);
</script>
