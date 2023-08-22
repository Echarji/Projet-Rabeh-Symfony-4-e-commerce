pipeline {
    agent any

    stages {
        stage('Increment Version') {
            steps {
                script {
                    def versionFile = 'version.txt'
                    def currentVersion = readFile(versionFile).trim()
                    def versionParts = currentVersion.split('\\.').collect { it.toInteger() }

                    versionParts[2]++ // Increment patch version

                    def newVersion = versionParts.join('.')
                    writeFile file: versionFile, text: newVersion

                    env.IMAGE_NAME = "${newVersion}-${BUILD_NUMBER}"

                    echo "Incremented version: ${currentVersion} -> ${newVersion}"
                    echo "Image name: ${env.IMAGE_NAME}"
                }
            }
        }
    }
    
    post {
        always {
            // Clean up after the pipeline finishes
            deleteDir()
        }
    }
}
