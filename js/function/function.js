if(typeof String.prototype.trim !== 'function') {
    String.prototype.trim = function() {
        return this.replace(/^\s+|\s+$/g, ''); 
    }
}
function toggleFullScreen() {
  if (!document.fullscreenElement &&    // alternative standard method
      !document.mozFullScreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement ) {  // current working methods
    if (document.documentElement.requestFullscreen) {
      document.documentElement.requestFullscreen();
    } else if (document.documentElement.msRequestFullscreen) {
      document.documentElement.msRequestFullscreen();
    } else if (document.documentElement.mozRequestFullScreen) {
      document.documentElement.mozRequestFullScreen();
    } else if (document.documentElement.webkitRequestFullscreen) {
      document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
    }
  } else {
    if (document.exitFullscreen) {
      document.exitFullscreen();
    } else if (document.msExitFullscreen) {
      document.msExitFullscreen();
    } else if (document.mozCancelFullScreen) {
      document.mozCancelFullScreen();
    } else if (document.webkitExitFullscreen) {
      document.webkitExitFullscreen();
    }
  }
}

function myTrim(valor) {    
    valor.value=valor.value.trim();
}

function fLetrasCompleto(valor)
{
    var letraN = '';
    var arreglo = 'ABCDEFGHIJKLMNÑOPQRSTUVWXYZ abcdefghijklmnñopqrstuvwxyzáéíóúÁÉÍÓÚ';
    for (var i=0;i<valor.value.length;i++)
    {
	if (arreglo.indexOf(valor.value.substr(i,1)) != -1)
	{
 	letraN = letraN + valor.value.substr(i,1);
	}
    }
    if(valor.value != letraN) {
	valor.value = letraN;
    }
}

function fnumero(valor)
{
    var letraN = '';
    var arreglo = '0123456789';
    for (var i=0;i<valor.value.length;i++)
    {
	if (arreglo.indexOf(valor.value.substr(i,1)) != -1)
	{
 	letraN = letraN + valor.value.substr(i,1);
	}
    }
    if(valor.value != letraN) {
	valor.value = letraN;
    }
}

