import React, {Fragment, useState, useEffect} from 'react';
import axios from 'axios';

const Direct = () => {

    const [data, setData] = useState([]);

    useEffect(() => {
        const fetchData = async () => {
            const result = await axios(
            "/memory_admin/controller/programme/programme_api.php",
            );
    
            setData(result.data);
            console.log("updated");
        }
            fetchData();
            console.log("mounted");
    
    }, [])


    var d = new Date();
    var date = d.toLocaleDateString();
    var heure = d.toLocaleTimeString();
    console.log(date)
    console.log(heure)
    var real = date + " " + heure
    real.replace("/", "-")
    // console.log("salut" + real)

    // const variable = "13/01/2021 08:59:00"
    // variable.replace("/","-");
    // console.log(variable)
    var result = data.filter(name => name.date_time_fr === date && name.heures_prog_debut < heure && name.heures_prog_fin > heure).length;


    console.log(date +  " " + heure)
    console.log(real)
    if("13/06/2021 08:47" < real){
        console.log("Marche")
    
    }else{
        console.log("No Marche")
    }


    // const Atm = () => {
    //     let date1 = new Date();

    //     let dateLocale = date1.toLocaleString('fr-FR',{
    //         weekday: 'long',
    //         year: 'numeric',
    //         month: 'numeric',
    //         day: 'numeric',
    //         hour: 'numeric',
    //         minute: 'numeric',
    //         second: 'numeric'});
    //     return (
    //         dateLocale
    //     )
    // }

    return( 
        <Fragment>
            
            {/* {console.log(date + " " + heure)} */}
            {console.log(date)}
            {console.log({data})}
            <div className="actu_concert">Actuellement en concert</div>
            {(result > 0 ? (result > 1 ? <div id="result_prgm_green">{result} concerts en ce moment </div> :  
            <div id="result_prgm_green">{result} concert en ce moment </div>) : <div className="fausseHauteur">
                <div id="result_prgm_red"> Aucun concert en ce moment <br /> <br /><img src="https://data.photofunky.net/output/image/8/9/3/2/8932a4/photofunky.gif" /> </div></div>)}

            {data.filter(name => name.date_time_fr === date && name.heures_prog_debut < heure && name.heures_prog_fin > heure ).map((item,key) => (
                <div className={`template${key % 2}`} key={key}>
                    
                {/* {console.log(filterData.size)} */}
                {/* {console.log(item.date_time_fr)}
                {console.log(real)} */}
                <div className="template_grid_1">
                    <img className="img_template_grid" src={`data:image/png;base64, ${item.image_programme}`} alt="" />
                </div>
                <div className="template_grid_2">
                    <div>{ item.nom_artiste }</div>
                    <div>{ item.nom_scene }</div>
                    <div>{ item.date_formatage }</div>
                    <div>{ item.heures_prog_debut } - {item.heures_prog_fin}</div>
                    <br />
                    {/* <div>{item.date_time_fr} --- {real}</div> */}
                </div>
            </div> 
            ))}

        </Fragment>
    )
}

export default Direct