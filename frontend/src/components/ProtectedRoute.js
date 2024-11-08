import React from 'react';
import { Navigate } from 'react-router-dom';
import { useAuth } from '../contexts/AuthContext';

const ProtectedRoute = ({ children }) => {
    const { token } = useAuth();

    if (!token) {
        // Redirect to the login page if not authenticated
        return <Navigate to="/" />;
    }

    return children;
};

export default ProtectedRoute;
