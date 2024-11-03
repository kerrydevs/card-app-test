import 'bootstrap/dist/css/bootstrap.min.css';
import './App.css';
import React from 'react';
import { Routes, Route } from 'react-router-dom';
import { AuthProvider } from './contexts/AuthContext';
import Login from './components/Login/Login';
import RandomCards from './components/RandomCards/RandomCards';
import ProtectedRoute from './components/ProtectedRoute';

const App = () => {
    return (
        <div id="app-container" className="container pt-5">
            <AuthProvider>
                <Routes>
                    <Route path="/" element={<Login />} />
                    <Route 
                        path="/random-cards" 
                        element={
                            <ProtectedRoute>
                                <RandomCards />
                            </ProtectedRoute>
                        } 
                    />
                </Routes>
            </AuthProvider>
        </div>
    );
};

export default App;
