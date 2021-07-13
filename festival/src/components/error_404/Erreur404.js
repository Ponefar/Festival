import React from 'react';
import { useHistory } from 'react-router-dom';
import Navigation from '../navigation/Navigation'

const Erreur404 = () =>{
    let history = useHistory();
    
    return(
        <div>
            <Navigation />
            <div>
                ERREUR 404 !!!!
            </div>
            <button onClick={() => history.push("/")}>
            Go to home 😇 </button>
        </div>
    )
}

export default Erreur404;