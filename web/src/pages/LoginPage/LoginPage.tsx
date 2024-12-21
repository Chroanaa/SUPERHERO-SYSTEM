import { Metadata } from '@redwoodjs/web'
import { Fragment, useState } from 'react'

const LoginPage = () => {
  const [email, setEmail] = useState('')
  const [password, setPassword] = useState('')

  const handleSubmit = (e) => {
    e.preventDefault()
    console.log('Email:', email)
    console.log('Password:', password)
  }

  return (
    <Fragment>
      <Metadata
        title="Login"
        description="Login first..."
      />

      <div id="login-wrapper" className="p-6 max-w-md mx-auto">
        <div id="login-header" className="mb-4">
          <h2 className="text-2xl font-semibold text-gray-800">Login</h2>
          <p className="text-sm text-gray-600">For barangay staffs in Brgy. Sta Lucia</p>
        </div>
        <form onSubmit={handleSubmit} id="login-form" className="space-y-4">
          <div id="form-group">
            <label
              htmlFor="email"
              className="block text-sm font-medium text-gray-700"
            >
              Email
            </label>
            <input
              type="email"
              id="email"
              name="email"
              placeholder="Enter your email"
              value={email}
              onChange={(e) => setEmail(e.target.value)}
              required
              className="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
            />
          </div>
          <div id="form-group">
            <label
              htmlFor="password"
              className="block text-sm font-medium text-gray-700"
            >
              Password
            </label>
            <input
              type="password"
              id="password"
              name="password"
              placeholder="Enter your password"
              value={password}
              onChange={(e) => setPassword(e.target.value)}
              required
              className="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
            />
          </div>
          <button
            type="submit"
            className="w-full px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
          >
            Login
          </button>
        </form>
        <div id="other-details" className="mt-4 text-sm text-gray-600">
          Don't have an account?{' '}
          <a
            href="#"
            className="text-blue-600 hover:underline focus:outline-none focus:ring-2 focus:ring-blue-500"
          >
            Register
          </a>
        </div>
        <div
          id="important-notice"
          className="mt-3"
        >
          This portal is only for staffs and employees in Brgy. Sta Lucia.
        </div>
      </div>

    </Fragment>
  )
}

export default LoginPage;