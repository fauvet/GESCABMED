var inputSecu = document.getElementById('i8');
var secuFormat = 'x xx xx xx xxx xxx xx';
// si l'input existe
if( inputSecu != null ){
	inputSecu.addEventListener('keyup', function(e){
		var inValue = e.target.value;
		for( var i = 0 ; i < inValue.length ; i++ ){
			if( secuFormat[i] != 'x' ){
				inValue = inValue.slice(0,i).concat([' ']).concat(inValue.slice(i));
				i--;
			}
				console.log(i);
		}
		e.target.value = inValue;

	}, false);

}