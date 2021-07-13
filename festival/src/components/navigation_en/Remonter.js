import React, {Fragment} from 'react'
import RetourEnHaut from '../../img/retour-en-haut.jpg'

const Remonter = () => {
    const Remonter = () => {
        return '<img class="remonter" src="https://www.johanncorbelconsulting.com/13-large_default/retour-en-haut.jpg" width="50px" alt="">'   
    }
    window.onscroll = () => {hauteur_scrool()};

    function hauteur_scrool(){
       const hauteur_screen = window.scrollY
       const rien = document.querySelector('.remonter')

        if(hauteur_screen >= 150){
            rien.style.marginRight = "0px"
            
            // console.log(rien)
        }else{
            rien.style.marginRight = "-65px"

            }
    }

    return(
        <Fragment>      
            <a href="#remonter">
                <div className="remonter"><img src={RetourEnHaut} width="50px" /> </div>
            </a>
        </Fragment>   
    )
}

export default Remonter