var el = document.getElementById('vanilla-demo');
var vanilla = new Croppie(el, {
    viewport: { width: 100, height: 100 },
    boundary: { width: 300, height: 300 },
    showZoomer: false,
    enableOrientation: true
});
vanilla.bind({
    url: 'demo/demo-2.jpg',
    orientation: 4
});
//on button click
vanilla.result('blob').then(function(blob) {
    // do something with cropped blob
});