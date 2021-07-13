import React, { Fragment } from 'react';
import Footer from '../footer_en/Footer';
import Navigation from '../navigation_en/Navigation';
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