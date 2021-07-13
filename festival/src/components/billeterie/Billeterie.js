import React from 'react';
import { Link } from 'react-router-dom';

const Billeterie = () => {
    return(
            <div className="billeterie">
                <Link to ="/Billeterie_page">
                    <button className="billeterie_btn">
                        Billeterie
                    </button>
                </Link>
            </div>
    )
}

export default Billeterie;