/**
 * Clase para el tratamiento de números
 */


class Numerics 
{
    constructor() 
    {
      
    }

    
    trunc(strNumber, decimals = 0)
    {
        let pointPosition = strNumber.indexOf('.')
        if (pointPosition > -1) {
            if (decimals === 0) {
                strNumber = strNumber.substring(0, pointPosition + decimals); 
            } else {
                strNumber = strNumber.substring(0, pointPosition + decimals + 1); 
            }
        } 
        return strNumber;
    }
}