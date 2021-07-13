import React, {Fragment, useState, useEffect} from 'react';
import axios from 'axios';



const Type_rap_prgm = () => {

    const [data, setData] = useState([]);

    const [typeOfRap, setTypeOfRap] = useState();
    
    const [filterData, setFilterData] = useState([]);

    const [autreFilter, setAutreFilter] = useState();

    const [autreFilter1, setAutreFilter1] = useState();


  useEffect(() => {
    const fetchData = async () => {
      const result = await axios(
        "/memory_admin/controller/programme/programme_api.php",
      );

      setData(result.data);

    };
    fetchData();

  }, [])


  useEffect(() => {

    if(typeOfRap && autreFilter && !autreFilter1){
        const filterTypeRap = data.filter(musique => musique.type_rap === typeOfRap && musique.nom_scene === autreFilter)
        setFilterData(filterTypeRap)
        return
    }

    if(typeOfRap && autreFilter1 && !autreFilter){
        const filterTypeRap = data.filter(musique => musique.type_rap === typeOfRap && musique.date_formatage_prgm === autreFilter1)
        setFilterData(filterTypeRap)
        return
    }

    if(autreFilter1 && autreFilter && !typeOfRap){
        const filterTypeRap = data.filter(musique => musique.date_formatage_prgm === autreFilter1 && musique.nom_scene === autreFilter)
        setFilterData(filterTypeRap)
        return
    }

    if(autreFilter1 && autreFilter &&  typeOfRap){
        const filterTypeRap = data.filter(musique => musique.type_rap === typeOfRap && musique.nom_scene === autreFilter && musique.date_formatage_prgm === autreFilter1 )
        setFilterData(filterTypeRap)
        return
    }

    if(typeOfRap || autreFilter || autreFilter1 ){

        const filterTypeRap = data.filter(musique => musique.nom_scene === autreFilter || musique.type_rap === typeOfRap || musique.date_formatage_prgm === autreFilter1)
        setFilterData(filterTypeRap)
        return
    }

    setFilterData(data)

    return
    
  }, [data, typeOfRap, autreFilter, autreFilter1])


  var result = filterData.length;


  const [nom_scene, setNom_scene] = useState([]);

    useEffect(() => {

        const fetchNom_scene = async () => {
        const result = await axios(
        "/memory_admin/controller/distinc_select_api.php",
        );

        setNom_scene(result.data);
        console.log("updated");
        };
        fetchNom_scene();
        console.log("mounted");

    }, [])


    const [nom_artiste, setNom_artiste] = useState([]);

    useEffect(() => {

        const fetchNom_artiste = async () => {
        const result = await axios(
        "/memory_admin/controller/distinc_select_api.php",
        );

        setNom_artiste(result.data);
        console.log("updated");
        };
        fetchNom_artiste();
        console.log("mounted");

    }, [])


    const [type_rap, setType_rap] = useState([]);

    useEffect(() => {

        const fetchType_rap = async () => {
        const result = await axios(
        "/memory_admin/controller/distinc_select_api.php",
        );

        setType_rap(result.data);
        console.log("updated");
        };
        fetchType_rap();
        console.log("mounted");

    }, [])


//   const handleClick = (key,e) => {  
//     e.preventDefault();    
//     console.log(key);  
//   }
    var test = "";
  return (
        <Fragment>
            <select name="" value={typeOfRap} onChange={(e) => {

                const selectedFoodT = e.target.value ;
                console.log(typeOfRap)

                setTypeOfRap(selectedFoodT)
            }}>
                <option value="">--- Musique ---</option>
                {type_rap.filter(rien => rien.type_rap).map((item, key) => (
                <Fragment key={key}>
                    <option value={item.type_rap}>{item.type_rap}</option>
                </Fragment>
                ))}
            
            </select>



            <select name="" value={autreFilter} onChange={(e) => {

            const selectedFood = e.target.value ;
                console.log(autreFilter)
            setAutreFilter(selectedFood)


            }}>
            <option value="">--- Scène ---</option>
            {nom_scene.filter(rien => rien.nom_scene).map((item, key) => (
            <Fragment key={key}>
            <option value={item.nom_scene}>{item.nom_scene}</option>
            </Fragment>
            ))}
            
            </select>
            

            <select name="" value={autreFilter1} onChange={(e) => {

            const selectedFoodTT = e.target.value ;
                setAutreFilter1(selectedFoodTT)
                console.log(setAutreFilter1(selectedFoodTT))

            }}>
            <option value="">--- Date ---</option>
            {nom_artiste.filter(rien => rien.date_formatage).map((item, key) => (

            <Fragment key={key}>
                { test = item.date_formatage }
                { test.includes("Monday") ? test = test.replace("Monday", "Lundi") : ""}
                { test.includes("Tuesday") ? test = test.replace("Tuesday", "Mardi") : ""}
                { test.includes("Wednesday") ? test = test.replace("Wednesday", "Mercredi") : ""}
                { test.includes("Thursday") ? test = test.replace("Thursday", "Jeudi") : ""}
                { test.includes("Friday") ? test = test.replace("Friday", "Vendredi") : ""}
                { test.includes("Saturday") ? test = test.replace("Saturday", "Samedi") : ""}
                { test.includes("Sunday") ? test = test.replace("Sunday", "Dimanche") : ""}
                <option value={item.date_formatage}>{test}</option>
            </Fragment>
            ))}

            </select>




            {/* {console.log(typeOfRap)} */}
            {/* <div> ({result} == 1 ?  {result} Résultat : {result} Résultats) </div> */}
                {(result > 0 ? (result > 1 ? <div id="result_prgm_green">{result} Résultats</div> : <div id="result_prgm_green">{result} Résultat</div>)  : <div className="fausseHauteur"><div id="result_prgm_red"> Aucun résultat trouvé  <br /> <br /><img src="https://data.photofunky.net/output/image/8/9/3/2/8932a4/photofunky.gif" /> </div></div>)}

            {filterData.map((item, key) => ( // enlever le filter
                <div className={`template${key % 2}`} key={key}>
                    
                    {/* {console.log(filterData.size)} */}
                    <div className="template_grid_1">
                        <img className="img_template_grid" src={`data:image/png;base64, ${item.image_programme}`} alt="" />
                    </div>
                    <div className="template_grid_2">
                        <div>{ item.nom_artiste }</div>
                        <div>{ item.nom_scene }</div>
                        <div>{ item.date_formatage }</div>
                        <div>{ item.heures_prog_debut } - {item.heures_prog_fin}</div>
                    </div>
                </div> 
            ))}
        </Fragment>
    )
}

export default Type_rap_prgm