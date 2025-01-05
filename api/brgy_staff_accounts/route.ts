import { NextRequest, NextResponse } from 'next/server';
import { STSClient, GetCallerIdentityCommand } from "@aws-sdk/client-sts";
import { fromEnv } from "@aws-sdk/credential-providers";

// Helper function to check AWS IAM credentials
async function checkAwsCredentials(request: NextRequest): Promise<boolean> {
  try {
    const credentials = fromEnv();
    const client = new STSClient({ 
      credentials,
      region: process.env.AWS_REGION
    });
    const command = new GetCallerIdentityCommand({});
    await client.send(command);
    return true;
  } catch (error) {
    console.error('API authentication failed:', error);
    return false;
  }
}

// Helper function for unauthorized response
function unauthorizedResponse() {
  return NextResponse.json({ error: 'Unauthorized' }, { status: 401 });
}

export async function GET(request: NextRequest) {
    if (!await checkAwsCredentials(request)) {
      return unauthorizedResponse();
    }
  
    try {
      // Implement GET logic here
      // For example, fetch staff accounts from database
      const body = await request.json();
  
      // Use the BRGY_STAFF_ACCOUNTS_API_KEY in your logic if needed
      const apiKey = process.env.BRGY_STAFF_ACCOUNTS_API_KEY;
      
      return NextResponse.json({ 
        message: 'GET BRGY_STAFF_ACCOUNTS', 
        data: body,
        keyUsed: true // Indicate that the API key was used
      });
    } catch (error) {
      console.error('Error processing GET request:', error);
      return NextResponse.json({ error: 'Internal Server Error' }, { status: 500 });
    }
  }
  