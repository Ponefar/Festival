import React, {Fragment} from 'react'
import { Link } from 'react-router-dom';


const Map = () => {
        return (
                <Fragment>
                    <Link to="/">
                        <div className="retourner">Accueil</div>
                    </Link>
                    <div id="msg_map_tablette"  onClick={()=> document.getElementById("msg_map_tablette").style.display = "none" }>Mettez votre mobile en mode tablette pour une meilleure utilisation
                    <div className="btn_modile_mode_tablette">J'ai compris</div>
                    </div>
                    <iframe className="iframe" src="https://www.google.com/maps/d/embed?mid=17h1GnS9eSRsgccSqHPQExDlAWMB58kyX&z=17" style={{border:"none"}}></iframe>
                </Fragment>
        )
}

export default Map
