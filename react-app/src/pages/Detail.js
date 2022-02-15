import React  from 'react';
import axios from 'axios';
import { useState } from "react";
import { useLocation, Navigate } from "react-router-dom";


export default function Detail () {
    // retrieve state data using useLocation hook
    const {state} = useLocation();

    const [isLoading, setLoading] = useState(true);
    const [updated, setUpdated] = useState(false);

    const [inputs, setInputs] = useState({descriptor: "", quantity: 1});
    const handleChange = (event) => {
        const name = event.target.name;
        const value = event.target.value;
        setInputs( values => ({...values, [name]: value}) );
    }

    //load data
    if(isLoading){
        async function getItemJSON() {
            const response = await axios.get("http://localhost:8000/api/items/" + state.id );
            return response.data;
        }
        getItemJSON()
            .then((data) => {
                setInputs( {descriptor: data.descriptor, quantity: data.quantity} );
                setLoading(false);
            })
            .catch((err) => console.log(err));
    }

    async function updateItem() {
        const response = await axios.put("http://localhost:8000/api/items/" + state.id, {descriptor: inputs.descriptor, quantity: inputs.quantity} );
        return response.data;
    }
    const handleSubmit = (event) => {
        event.preventDefault();
        updateItem().then((data) => {
            if(data === 201)
                setUpdated(true);
        })
        .catch((err) => console.log(err));
    }
    

    //wait until json is loaded. otherwise we get undefined errors when trying to work with the data
    if(updated)
        return <Navigate to="/" />;
    if (isLoading) {
        return <div className="Home text-center">Loading...</div>;
    }
    return (
        <div class="container" style={{ marginLeft: '44%'}}>
            <form onSubmit={handleSubmit}>
                <h1>edit inventory item:</h1>
                <label>Description: <input type="text" value={inputs.descriptor || ""} name="descriptor" onChange={handleChange} required/></label>
                <br/><label>Quantity: <input type="number" value={inputs.quantity || ""} name="quantity" onChange={handleChange} required/></label>
                <br/><input type="submit"/>
            </form>
        </div>
    );
}

