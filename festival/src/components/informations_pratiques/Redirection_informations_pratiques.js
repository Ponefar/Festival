import React from 'react' ;
import { Link } from 'react-router-dom';

const Redirection_informations_pratiques = () => {
    return(
    <ul className="image_reseau_sociaux_flex">
        <div className="informations_pratique_accueil">
            <Link to ="Informations_pratiques">
                <p className="info_redirect" >Toutes les informations pratiques</p> 
            </Link> 
            <p style={{fontSize:"22px" }}>Tous droits réservés - 2021</p>

        </div>
    </ul>
    )
}

export default Redirection_informations_pratiques