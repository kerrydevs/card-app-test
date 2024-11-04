import React, { useState } from 'react';
import { useAuth } from '../../contexts/AuthContext';
import { useNavigate } from 'react-router-dom';
import styles from './Login.module.css';

const Login = () => {
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');
    const [error, setError] = useState(null);
    const [loading, setLoading] = useState(false);
    const { login } = useAuth();
    const navigate = useNavigate();

    const handleSubmit = async (e) => {
        e.preventDefault();
        setLoading(true);
        setError('');

        // Call to backend login api
        const loginApi = process.env.REACT_APP_API_URL + '/login';

        try {
            const response = await fetch(loginApi, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ email, password }),
            });

            if (response.status !== 200) {
                let errorData = await response.json();
                setError(errorData.error);
                setEmail('');
                setPassword('');
            } else {
                const data = await response.json();

                // Call to Auth login function
                login(data.token);

                // Redirect to the random cards page
                navigate('/random-cards');
            }
        } catch (error) {
            setError("Request Error");
            setEmail('');
            setPassword('');
        } finally {
            setLoading(false);
        }
    };

    return (
        <div className="col-12">
            <div className={`${styles.container} d-flex w-100`}>
                <div className="col-sm-4 col-12">
                    <div className={`${styles.card} card`}>
                        <div className="card-body">
                            <h3 className="card-title text-center">Login To Card App</h3>
                            <form className="mt-4" onSubmit={handleSubmit}>
                                <div className="mb-3">
                                    <label htmlFor="email" className="form-label text-left">Email:</label>
                                    <input
                                        type="email"
                                        className="form-control"
                                        id="email"
                                        value={email}
                                        onChange={(e) => setEmail(e.target.value)}
                                        required
                                    />
                                </div>
                                <div className="mb-4">
                                    <label htmlFor="password" className="form-label">Password:</label>
                                    <input
                                        type="password"
                                        className="form-control"
                                        id="password"
                                        value={password}
                                        onChange={(e) => setPassword(e.target.value)}
                                        required
                                    />
                                </div>
                                <button type="submit" className="btn btn-primary w-100">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div className="d-flex justify-content-center mt-4">
                <div className="col-sm-4 col-12">
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
        </div>
    );
};

export default Login;
