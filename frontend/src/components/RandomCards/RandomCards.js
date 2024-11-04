import React, { useState } from 'react';
import styles from './RandomCards.module.css';

const RandomCards = () => {
    const [numberOfPeople, setNumberOfPeople] = useState('');
    const [results, setResults] = useState([]);
    const [error, setError] = useState('');
    const [loading, setLoading] = useState(false);
    const [peoples, setPeoples] = useState([]);

    const handleSubmit = async (e) => {
        e.preventDefault();
        setLoading(true);
        setError('');

        // Call to backend login api
        const randomCardsApi = process.env.REACT_APP_API_URL + '/card/random';
        const token = localStorage.getItem('token');

        try {
            const response = await fetch(`${randomCardsApi}?num_of_people=${numberOfPeople}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${token}`
                }
            });

            if (response.status !== 200) {
                let errorData = await response.json();
                setError(errorData.error);
                setPeoples([]);
            } else {
                const results = await response.json();
                setResults(results);

                // Generate people rows from number of people
                let peopleList = [];
                for (let i = 0; i < numberOfPeople; i++) {
                    if (results[i] && Array.isArray(results[i])) {
                        peopleList.push(results[i].join(','));
                    } else {
                        peopleList.push('No Card');
                    }
                    
                }
                setPeoples(peopleList);
            }
        } catch (error) {
            setError("Request Error");
            setPeoples([]);
        } finally {
            setLoading(false);
        }
    };

    return (
        <div className="col-12">
            <h3 className="text-center">Number of People to Random Cards</h3>
            <div className="d-flex justify-content-center mt-4">
                <form className="col-sm-2 col-12" onSubmit={handleSubmit}>
                    <div className="mb-3">
                        <input
                            type="text"
                            className="form-control"
                            id="email"
                            value={numberOfPeople}
                            onChange={(e) => setNumberOfPeople(e.target.value)}
                            required
                        />
                    </div>
                    <button type="submit" className="btn btn-primary w-100">Random Now</button>
                </form>
            </div>

            <div className="d-flex justify-content-center mt-4">
                <div className="col-sm-2 col-12">
                    {loading && (
                        <div className="w-100 text-center">
                            <div className="spinner-border" role="status">
                                <span className="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    )}
                    {error && <div className="alert alert-danger" role="alert">{error}</div>}
                </div>
            </div>

            {peoples.length > 0 && (
                <div className="d-flex justify-content-center mt-5 w-100">
                    <div className="col-sm-8 col-12">
                        <table className="table table-striped table-bordered col-sm-8 col-12">
                            <thead>
                                <tr>
                                    <th>People</th>
                                    <th>Random Cards</th>
                                </tr>
                            </thead>
                            <tbody>
                                {peoples.map((item, index) => (
                                    <tr key={index}>
                                        <td>{index + 1}</td>
                                        <td>{item}</td>
                                    </tr>
                                ))}
                            </tbody>
                        </table>
                    </div>
                </div>
            )}
        </div>
    );
};

export default RandomCards;
