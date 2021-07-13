import React, { useState, useEffect, Fragment } from "react";
import axios from "axios";
import Soleil from '../../img/soleil.png'
const Meteo = () => {

  const [temp, settemp] = useState([]);
  const ville = "Sete"

  useEffect(() => {
    axios(`https://api.openweathermap.org/data/2.5/weather?q=${ville}&appid=b391fd1e50ca575d8a12938c64fca49e`).then((res) => {
      settemp(res.data.main);
      
    });
  }, []);


  return (
    <Fragment>
        <div className="meteo">
            {(Math.round(temp.temp - 273.15) >= 0 ? <div style={{padding:"15px 15px 15px 35px"}}><img className="soleil" src={Soleil} alt="" /> {Math.round(temp.temp - 273.15) + "° C : Remember to hydrate"} </div> : "")}
                        
        </div>
    </Fragment>
  );
};

export default Meteo;