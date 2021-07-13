import React, { Fragment } from 'react';
import Redirection_informations_pratiques from '../informations_pratiques_en/Redirection_informations_pratiques'
import Reseau_sociaux from '../reseaux_sociaux/Reseau_sociaux'

const Footer = () => {
    return (
        <Fragment>
            <Redirection_informations_pratiques />
            <Reseau_sociaux />
        </Fragment>
    )
}

export default Footer