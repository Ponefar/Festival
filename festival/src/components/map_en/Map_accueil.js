import React, {Fragment} from 'react'
import { Link } from 'react-router-dom'
import Extends from '../../img/extends.png'

const Map_accueil = () => {

        return (
                <Fragment >
                       <div style={{position : "relative"}}>
                        <Link to="./Map">
                        <div className="extends"><img src={Extends}></img></div>
                        </Link>
                        <iframe src="https://www.google.com/maps/d/embed?mid=17h1GnS9eSRsgccSqHPQExDlAWMB58kyX&z=16" width="100%" height="480" style={{border:"none"}} >
                        </iframe>
                        </div>
                </Fragment>
        )
}

export default Map_accueil
