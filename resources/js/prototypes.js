function capitalizeSentence ( str ) {

    // if the string is not provided, and if it's called directly on the string, we can access the text via 'this'
    if ( ! str ) { str = this; }
  
    // let's split the string after every '.', Since every sentence ends with a dot.
    let sentences = str.split('.');
    let updated = [];
  
    // let's map over our sentences array 
    sentences.map( function (sentence) {
      if ( sentence ) {
        // if the first character is not space
        if ( sentence[0] !== ' ' ) {
          let output = sentence.charAt(0).toUpperCase() + sentence.slice(1);
          updated.push( output );
        }
        // if the first character is space
        else {
          let output = sentence.charAt(1).toUpperCase() + sentence.slice(2);
          updated.push( ' ' + output );
        }
      }
    });
  
    // let's join our array with ., same character we split it with.
    let final = updated.join('.');
  
    // if the sentence ends with ., let's add it to our final output as well.
    if ( str.endsWith('.') ) {
      final += '.';
    }
  
    return final;
  }
  
  
  // let's add our method on String prototype.
  String.prototype.capitalize = capitalizeSentence;