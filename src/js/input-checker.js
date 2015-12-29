//   __                            _             _               _             
//  / _| ___  _ __ _ __ ___   __ _| |_       ___| |__   ___  ___| | _____ _ __ 
// | |_ / _ \| '__| '_ ` _ \ / _` | __|____ / __| '_ \ / _ \/ __| |/ / _ \ '__|
// |  _| (_) | |  | | | | | | (_| | ||_____| (__| | | |  __/ (__|   <  __/ |   
// |_|  \___/|_|  |_| |_| |_|\__,_|\__|     \___|_| |_|\___|\___|_|\_\___|_|   
//
function formatChecker(pValue, pPattern, pRules){
	this.value   = pValue;
	this.pattern = pPattern;
	this.rules   = (arguments.length>2) ? pRules   : [];
};

formatChecker.prototype = {
	value:         this.value,    // valeur à formater
	pattern:       this.pattern,  // format global
	rules:         this.rules,    // définition des règles du format global
	regexp:        null,          // contiendra la RegExp de validation
	// règles par défaut
	default_rules: {
		'i': '[0-9]',   // i = integer
		'a': '[a-z]',   // a = lower case
		'A': '[A-Z]',   // A = upper case
		'x': '[a-zA-Z]' // x = letter
	},

	// créé une RegExp en fonction du format global @pattern et des règles @rules
	compile: function(){
		var RegExpExpr = '^'; // contiendra les chaines de la regex
		var RegExpDecomposition = [];

		// on parcours les caractères du pattern
		for( var i = 0 ; i < this.pattern.length ; i++ ){
			/* [1] Cas où la règle est définie par l'utilisateur
			====================================================*/
			if( this.rules.hasOwnProperty( this.pattern[i] ) ){
				RegExpExpr += this.rules[ this.pattern[i] ];
				RegExpDecomposition.push( this.rules[ this.pattern[i] ] );

			/* [2] Cas où la règle est définie par défaut
			====================================================*/
			}else if( this.default_rules.hasOwnProperty( this.pattern[i] ) ){
				RegExpExpr += this.default_rules[ this.pattern[i] ];
				RegExpDecomposition.push( this.default_rules[ this.pattern[i] ] );

			/* [3] Cas où on prends juste le caractère en compte
			====================================================*/
			}else{
				RegExpExpr += this.pattern[i];
				RegExpDecomposition.push( this.pattern[i] );
			}
		}

		RegExpExpr += '$';

		// on définit la RegExp associée
		this.regexp = new RegExp( RegExpExpr );
		// on la complète avec la décomposition par caractère du pattern
		this.regexp.patternDecomposition = RegExpDecomposition;
	},


	// vérifie la validité en utilisant la RegExp, si elle n'est pas générée, on la génère
	check: function(pPlotPlate){
		/* [1] On génère la RegExp si ce n'est pas déjà fait
		====================================================*/
		if( this.regexp == null ) this.compile();
		

		/* [2] Gestion de la plaque à trous
		====================================================*/
		if( arguments.length > 0 && pPlotPlate instanceof Array){

			// on parcours les caractères du pattern
			for( var i = 0 ; i < this.pattern.length ; i++ ){

				var RegExpExpr = '^';

				/* [1] Cas où la règle est définie par l'utilisateur
				====================================================*/
				if( this.rules.hasOwnProperty( this.pattern[i] ) )
					RegExpExpr += this.rules[ this.pattern[i] ];

				/* [2] Cas où la règle est définie par défaut
				====================================================*/
				else if( this.default_rules.hasOwnProperty( this.pattern[i] ) )
					RegExpExpr += this.default_rules[ this.pattern[i] ];

				/* [3] Cas où on prends juste le caractère en compte
				====================================================*/
				else
					RegExpExpr += this.pattern[i];

				RegExpExpr += '$';

				pPlotPlate.push( this.value[i].match( new RegExp(RegExpExpr) ) != null );
			}

		}
		

		// on retourne TRUE si c'est bon, FALSE sinon
		return this.value.match( this.regexp ) != null;
	}

};

/***********/
/* USECASE */
/***********/
/* [1] On créé une instance du formatChecker()
==================================================*/
/*HIDDEN*///var instance = new formatChecker(
/*HIDDEN*///	'te2t 1 2 1/23', // la chaîne à vérifier
/*HIDDEN*///	'aava i i i/ii', // le schéma à respecter (cf. règles par défaut)
/*HIDDEN*///	{'v': '[0-2]'}   // règles spécifiques. Ici, 'v' correspond à un chiffre compris entre 0 et 2
/*HIDDEN*///);

/* [2] On récupère le résultat de la vérification
==================================================*/
// Note. On passe ici en paramètre un tableau qui va être rempli à TRUE pour les caractères
// 		 correspondant au schéma, FALSE pour les erreurs
/*HIDDEN*///var respecteSchema = instance.check( plotPlate=[] );
/*HIDDEN*///console.log( respecteSchema ); // affichera "true"

/* [3] On accède à la plotPlate (afin de vérifier d'où vient l'erreur)
==================================================*/
/*HIDDEN*///console.log( plotPlate );      // affichera "[true, true, true, ..]""






//  _                   _             _               _             
// (_)_ __  _ __  _   _| |_       ___| |__   ___  ___| | _____ _ __ 
// | | '_ \| '_ \| | | | __|____ / __| '_ \ / _ \/ __| |/ / _ \ '__|
// | | | | | |_) | |_| | ||_____| (__| | | |  __/ (__|   <  __/ |   
// |_|_| |_| .__/ \__,_|\__|     \___|_| |_|\___|\___|_|\_\___|_|   
//
function inputChecker(){};

inputChecker.prototype = {
	input:   [], // contiendra les éléments HTML <input>
	defval:  [], // contiendra les valeurs par défaut ou NULL si pas défini
	checker: [], // contiendra les classes <formatChecker>


	/* Ajout d'un champ <input> au vérificateur
	*
	* @pInputElement<HTMLInputElement>			l'élément <input> à vérifier
	* @pFormatChecker<formatChecker>			l'instance <formatChecker> associée à la valeur voulue du champ
	* @pDefaultValue<String>					[OPT] Valeur par défaut pour l'input
	*
	*
	* @return ajouté<Boolean>					retourne TRUE, si le champ a bien été ajouté
	*                                      		retourne FALSE, si une erreur occure
	*/
	append: function(pInputElement, pFormatChecker, optDefaultValue){
		/* [1] Vérification des types
		====================================================*/
		if( !(pInputElement instanceof HTMLInputElement) ) return false; // si c'est pas un <input>, retourne FALSE
		if( !(pFormatChecker instanceof formatChecker)   ) return false; // si c'est pas un <formatChecker>, retourne FALSE


		/* [2] Référencement des nouvelles données
		====================================================*/
		// insertion du <input>
		var index = this.input.push( pInputElement );

		// insertion du <formatChecker>, si pb d'insertion, retourne FALSE
		if( index != this.checker.push(pFormatChecker) ) return false;

		// insertion de la valeur par défaut (si définie), si pb d'insetion, retourne FALSE
		if( index != (this.defval.push((arguments.length>2)?optDefaultValue:null)) ) return false;
	},



	/* Vérifie le format d'un champ <input> de rang spécifié
	*
	* @pInputElement<HTMLInputElement>		L'élement qu'on veut vérifier
	*
	*
	* @return verification<Boolean>			retourne TRUE si la vérification s'avère correcte
	*                                       retourne FALSE si la vérification est incorrecte
	*/
	check: function(pInputElement){
		// si l'élément n'est pas référencé, retourne FALSE
		var index = this.input.indexOf( pInputElement );
		if( index < 0 ) return false;

		/* [1] On remplace la valeur de vérification du <formatChecker> par la valeur actuelle de l'élément <input>
		====================================================*/
		this.checker[index].value = this.input[index].value;

		/* [2] On renvoie le résultat du checker
		====================================================*/
		return this.checker[index].check();
	},



	/* Vérifie le format de tous les champs <input>
	*
	* @return verifications<Boolean>	retourne TRUE si les vérifications s'avèrent correctes
	*                                   retourne FALSE si les vérifications sont incorrectes
	*/
	checkAll: function(){
		var checkerCumul = true;

		for( var i = 0 ; i < this.input.length ; i++ )
			checkerCumul = checkerCumul && this.check(this.input[i]);

		return checkerCumul;
	},


	/* Applique une correction en fonction du schéma
	*
	* @pInputElement<HTMLInputElement>		l'élément <input> concerné
	* @pToEnd<Boolean>						si on doit corriger jusqu'à la fin ou uniquement jusqu'à l'avancéé actuelle
	*
	* 
	* @return correctValue<String>			retourne la valeur corrigée
	*                                       retourne NULL si erreur
	*/
	correct: function(pInputElement, pToEnd){
		/* GESTION PARAMS */

		// on retourne une erreur si l'élément <input> n'est pas référencé
		if( (index = this.input.indexOf(pInputElement)) < 0 ) return null;

		var pToEnd = (arguments.length>1) ? pToEnd : true;



		/* [1] On met à jour la valeur du <formatChecker>
		====================================================*/
		this.checker[index].value = this.input[index].value;


		this.checker[index].compile();                                      // on génére la RegExp
		var RegExpByChar = this.checker[index].regexp.patternDecomposition; // on retire "/^" et "$/" de la RegExp
		var tmpValue     = this.input[index].value;                         // on copie la "value" pour la modifier


		if( !this.check(pInputElement) ){                     // si la chaîne n'est pas correcte

			var lastChar = null;

			/* [2] Cas 1 : vérification de la chaîne complète
			====================================================*/
			for( var i = 0 ; i < RegExpByChar.length ; i++ ){ // on parcours le pattern

				// si on dépasse de la valeur saisie et qu'on doit pas aller jusqu'à la fin, on quitte le FOR
				if( !pToEnd && i >= this.input[index].value.length )
					break;

				lastChar = tmpValue[i];

				// RegExp sur le caractère en question
				var tmpRegExp = new RegExp( '^'+RegExpByChar[i]+'$' );

				/* (1) Valeur inexistante (string.length < schéma.length)
				-----------------------------------------------------------*/
				if( tmpValue.length == 0 || tmpValue[i] == null )
					tmpValue = tmpValue.slice(0, i).concat( this.defval[index][i] ).concat( tmpValue.slice(i) );
				
				/* (2) Valeur ne correspond pas au schéma du caractère
				-----------------------------------------------------------*/
				else if( tmpValue[i].match(tmpRegExp) == null ){
					// si le caractère suivant match, on décale d'une position
					if( tmpValue[i].match(new RegExp( '^'+RegExpByChar[i+1]+'$' )) != null ) 
						tmpValue = tmpValue.slice(0, i).concat( this.defval[index][i] ).concat( tmpValue.slice(i) );
					// sinon on remplace
					else
						tmpValue = tmpValue.slice(0, i).concat( this.defval[index][i] ).concat( tmpValue.slice(i+1) );
				}
			}


			// on tronque ce qui dépasse
			tmpValue = tmpValue.slice(0, RegExpByChar.length);

			// on met à jour la valeur de l'élément input
			this.input[index].value = tmpValue; 
		}


	}


};