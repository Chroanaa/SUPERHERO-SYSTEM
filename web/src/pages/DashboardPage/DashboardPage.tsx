// import { Link, routes } from '@redwoodjs/router'
import { Metadata } from '@redwoodjs/web'

const DashboardPage = () => {
  const handleLogout = () => {
    // Add your logout logic here
    console.log('User logged out')
  }

  return (
    <>
      <Metadata title="Dashboard" description="Dashboard page" />

      <div className="flex items-center justify-center min-h-screen bg-gray-100">
        <div className="text-center">
          <h1 className="text-4xl font-semibold text-gray-800 mb-4">Welcome, User!</h1>
          <p className="text-gray-600 mb-6">You may now please log out.</p>
          <button
            onClick={handleLogout}
            className="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
          >
            Log Out
          </button>
        </div>
      </div>
    </>
  )
}

export default DashboardPage