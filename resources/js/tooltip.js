(() => {
    console.log('Tooltip Click JS Loaded');
    const tooltipTriggers = document.querySelectorAll('.tooltip-trigger');

    tooltipTriggers.forEach(trigger => {
        trigger.addEventListener('click', function() {
            const tooltipContent = this.nextElementSibling;
            tooltipContent.classList.toggle('show-tooltip');
        });

        trigger.addEventListener('mouseenter', function() {
            const tooltipContent = this.nextElementSibling;
            tooltipContent.classList.add('show-tooltip');
        });

        trigger.addEventListener('mouseleave', function() {
            const tooltipContent = this.nextElementSibling;
            tooltipContent.classList.remove('show-tooltip');
        });
    });
})()
