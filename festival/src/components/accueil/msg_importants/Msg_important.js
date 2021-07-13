import React, {Fragment, useState, useEffect} from 'react';
import axios from 'axios';
import { Slide } from 'react-slideshow-image';

import Meteo from '../Meteo'

const proprietes = {
  duration : 10000,
  transitionDuration: 500,
  // transitionDuration: false,
  infinite : true,
  indicators: true,
  arrows: false
}

// var d = new Date();
// const Date = () => d.getDate()+'-'+(d.getMonth()+1)+'-'+d.getFullYear();
// // console.log(date);


// var d = new Date();
// var hours = d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
// // console.log(hours);

// const Date_ = () => {
//   var d = new Date();
//   var hours = d.getDate() + "-" + d.getMonth() + "-" + d.getFullYear();
// return hours
// }

// const Heure = () => {
//    return 1
// }

const Accueil = () => {
  const [data, setData] = useState([]);


  useEffect(() => {
    const fetchData = async () => {
      const result = await axios.get(
        '/memory_admin/controller/msg_important_fr/msg_important_api.php',
      );

      setData(result.data);
      console.log("updated");
    };
    fetchData();
    console.log("mounted");

  }, [])
  const handleClick = (key,e) => {  
    e.preventDefault();    
    console.log(key);  
  }

  return (
    <Fragment> 
      <Meteo />
      {/* {Date_()} <br />
      {Heure()} */}
      <ul className="msg_important">
      <i className='fas fa-exclamation-triangle' id="important" style={{fontSize:"22px", color:"white"}}></i>

        <div className="containerSlide">
          <Slide {...proprietes}>
          {data./*filter(name => name.id === 286).*/map((item, key) => (
            // {data.map((item, key) =>(
              <a onClick={(e) => handleClick(key,e)} key={key} >
              {/* <a href="https://google.com"> */}
                <li className={"article"} key={key}>
                  {/* <p>{item.image}</p> */}


                  {/* <img src={`data:image/png;base64, ${item.image}`} alt="" /> */}
                  <p className="titre">
                    {item.titre_msg_impotant}
                    
                 </p>
 

                  {/* <p>{ key }</p> */}
                  {/* <div className="each-slide">
                    <div>
                      <img src={image1} alt="image1" />
                    </div>
                  </div> */}
                </li>
              {/* </a> */}
              </a>
            ))}
          </Slide>
        </div>
      </ul>
    </Fragment> 
  ) 
}

export default Accueil;
