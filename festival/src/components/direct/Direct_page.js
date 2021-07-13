import React, { Fragment } from 'react';
import Footer from '../footer/Footer';
import Navigation from '../navigation/Navigation';
import Direct from './Direct';

const Direct_page = () => {
    return(
        <Fragment>
            <Navigation />
            <Direct />
            <Footer />
        </Fragment>
    )
}

export default Direct_page