import React from 'react' ;
import { Link } from 'react-router-dom';

const Redirection_informations_pratiques_en = () => {
    return(
    <ul className="image_reseau_sociaux_flex">
        <div className="informations_pratique_accueil">
            <Link to ="Informations_pratiques_en">
                <p className="info_redirect" >All practical information</p> 
            </Link> 
            <p style={{fontSize:"22px" }}>All rights reserved - 2021</p>

        </div>
    </ul>
    )
}

export default Redirection_informations_pratiques_en