import React  from 'react';
import axios from 'axios';
import { useState } from "react";
import { useNavigate, Link } from "react-router-dom";


export default function Home () {
    const [isLoading, setLoading] = useState(true);
    const [items, setItems] = useState({});

    //load json only once. prevents an out of memory crash in chrome
    if(isLoading){
        async function getItemsJSON() {
            const response = await axios.get("http://localhost:8000/api/items/");
            return response.data;
        }
        getItemsJSON()
            .then((data) => {
                setItems(data);
                setLoading(false);
            })
            .catch((err) => console.log(err));
    }

    //wait until json is loaded. otherwise we get undefined errors when trying to work with the data
    if (isLoading) {
        return <div className="Home text-center">Loading...</div>;
    }
    return (
        <div className="Home">
            <Table data={items}/>
        </div>
    );
}

function Table(props){
    const tableCss = `
        #items {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        
        #items td, #items th {
            border: 1px solid #ddd;
            padding: 8px;
        }
        
        #items tr:nth-child(even){background-color: #ddd;}
        
        #items tr:hover {background-color: #ccc;}
        
        #items th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: rgb(104, 107, 112);
            color: white;
        }
    `;

    //utilise the useNavigate hook from react router dom to navigate to the next page and pass state data
    const navigate = useNavigate();
    function toEdit(arg) {
        navigate("/edit", { state: {id: arg} });
    }

    const RenderHeader = () =>{
        return(
            <tr>
                <th>Id</th>
                <th>Description</th>
                <th>Quantity</th>
            </tr>
        );
    }

    const RenderRows = () =>{
        return props.data.map((row) =>
            <tr key={row.id} onClick={() => toEdit(row.id)} style={{cursor: 'pointer'}}>
                <td>{row.id}</td>
                <td>{row.descriptor}</td>
                <td>{row.quantity}</td>
            </tr>
        );
    }

    return (
        <div class="container">
            <style>{tableCss}</style>
            <h1 class="text-center">Inventory</h1>
            <table id="items">
                <thead>
                    {RenderHeader()}
                </thead>
                <tbody>
                    {RenderRows()}
                </tbody>
            </table>
            <Link to="add"><button style={{ marginTop: '15px', marginBottom: '15px'}} type='button' className='btn btn-primary'>Add new item</button></Link>
        </div>
        
    );

}
